<?php
declare(strict_types=1);

/**
 * AlexDevCode — shared website audit engine.
 * No output, no sessions, reusable by API and paid fulfillment.
 */

function adc_audit_engine_normalize_url(
    string $raw
): string {
    $raw = trim($raw);

    if ($raw === '') {
        return '';
    }

    if (
        !preg_match(
            '~^https?://~i',
            $raw
        )
    ) {
        $raw =
            'https://'
            . $raw;
    }

    return $raw;
}

function adc_audit_engine_public_host(
    string $host
): bool {
    $host =
        strtolower(
            trim(
                $host,
                '.'
            )
        );

    if (
        $host === ''
        || $host === 'localhost'
        || str_ends_with(
            $host,
            '.local'
        )
        || str_ends_with(
            $host,
            '.internal'
        )
    ) {
        return false;
    }

    if (
        filter_var(
            $host,
            FILTER_VALIDATE_IP
        )
    ) {
        return
            (bool) filter_var(
                $host,
                FILTER_VALIDATE_IP,
                FILTER_FLAG_NO_PRIV_RANGE
                | FILTER_FLAG_NO_RES_RANGE
            );
    }

    $records =
        @dns_get_record(
            $host,
            DNS_A | DNS_AAAA
        );

    if (!$records) {
        return false;
    }

    foreach ($records as $record) {
        $ip =
            $record['ip']
            ?? $record['ipv6']
            ?? '';

        if (
            !$ip
            || !filter_var(
                $ip,
                FILTER_VALIDATE_IP,
                FILTER_FLAG_NO_PRIV_RANGE
                | FILTER_FLAG_NO_RES_RANGE
            )
        ) {
            return false;
        }
    }

    return true;
}

function adc_audit_engine_validate_url(
    string $url
): array {
    if (
        !filter_var(
            $url,
            FILTER_VALIDATE_URL
        )
    ) {
        return [
            false,
            'URL inválida.',
        ];
    }

    $scheme =
        strtolower(
            (string) parse_url(
                $url,
                PHP_URL_SCHEME
            )
        );

    $host =
        (string) parse_url(
            $url,
            PHP_URL_HOST
        );

    if (
        !in_array(
            $scheme,
            ['http', 'https'],
            true
        )
        || $host === ''
    ) {
        return [
            false,
            'Use um endereço HTTP ou HTTPS válido.',
        ];
    }

    if (
        !adc_audit_engine_public_host(
            $host
        )
    ) {
        return [
            false,
            'Este endereço não pode ser analisado.',
        ];
    }

    return [
        true,
        '',
    ];
}

function adc_audit_engine_resolve_redirect(
    string $base,
    string $location
): string {
    if (
        preg_match(
            '~^https?://~i',
            $location
        )
    ) {
        return $location;
    }

    $parts =
        parse_url($base);

    if (!$parts) {
        return '';
    }

    $origin =
        ($parts['scheme'] ?? 'https')
        . '://'
        . ($parts['host'] ?? '');

    if (!empty($parts['port'])) {
        $origin .=
            ':'
            . $parts['port'];
    }

    if (
        str_starts_with(
            $location,
            '/'
        )
    ) {
        return
            $origin
            . $location;
    }

    $path =
        (string) (
            $parts['path']
            ?? '/'
        );

    $dir =
        rtrim(
            str_replace(
                '\\',
                '/',
                dirname($path)
            ),
            '/'
        );

    return
        $origin
        . (
            $dir
                ? $dir . '/'
                : '/'
        )
        . $location;
}

function adc_audit_engine_fetch(
    string $url
): array {
    $current = $url;

    for (
        $hop = 0;
        $hop < 4;
        $hop++
    ) {
        [$valid] =
            adc_audit_engine_validate_url(
                $current
            );

        if (!$valid) {
            return [
                'ok' => false,
                'error' =>
                    'Redirecionamento não permitido.',
            ];
        }

        $headers = [];
        $body = '';

        $ch =
            curl_init($current);

        curl_setopt_array(
            $ch,
            [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_TIMEOUT => 12,
                CURLOPT_USERAGENT =>
                    'Mozilla/5.0 (Windows NT 10.0; Win64; x64) '
                    . 'AppleWebKit/537.36 (KHTML, like Gecko) '
                    . 'Chrome/153.0.0.0 Safari/537.36',
                CURLOPT_HTTPHEADER => [
                    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                    'Accept-Language: pt-PT,pt;q=0.9,en;q=0.7',
                    'Cache-Control: no-cache',
                ],
                CURLOPT_ENCODING => '',
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_SSL_VERIFYHOST => 2,
                CURLOPT_HEADERFUNCTION =>
                    static function (
                        $curl,
                        $line
                    ) use (
                        &$headers
                    ) {
                        $len =
                            strlen($line);

                        $line =
                            trim($line);

                        if (
                            $line !== ''
                            && str_contains(
                                $line,
                                ':'
                            )
                        ) {
                            [$name, $value] =
                                array_map(
                                    'trim',
                                    explode(
                                        ':',
                                        $line,
                                        2
                                    )
                                );

                            $headers[
                                strtolower($name)
                            ] = $value;
                        }

                        return $len;
                    },
                CURLOPT_WRITEFUNCTION =>
                    static function (
                        $curl,
                        $chunk
                    ) use (
                        &$body
                    ) {
                        $remaining =
                            2_000_000
                            - strlen($body);

                        if (
                            $remaining <= 0
                        ) {
                            return
                                strlen(
                                    $chunk
                                );
                        }

                        $body .=
                            substr(
                                $chunk,
                                0,
                                $remaining
                            );

                        return
                            strlen(
                                $chunk
                            );
                    },
            ]
        );

        if (
            defined(
                'CURLOPT_PROTOCOLS'
            )
        ) {
            curl_setopt(
                $ch,
                CURLOPT_PROTOCOLS,
                CURLPROTO_HTTP
                | CURLPROTO_HTTPS
            );
        }

        $started =
            microtime(true);

        $result =
            curl_exec($ch);

        $elapsedMs =
            (int) round(
                (
                    microtime(true)
                    - $started
                )
                * 1000
            );

        $status =
            (int) curl_getinfo(
                $ch,
                CURLINFO_RESPONSE_CODE
            );

        $contentType =
            (string) curl_getinfo(
                $ch,
                CURLINFO_CONTENT_TYPE
            );

        $error =
            curl_error($ch);

        curl_close($ch);

        if (
            $result === false
            && $body === ''
        ) {
            return [
                'ok' => false,
                'error' =>
                    $error !== ''
                        ? 'Não foi possível carregar o site.'
                        : 'O site não respondeu.',
            ];
        }

        if (
            $status >= 300
            && $status < 400
            && !empty(
                $headers['location']
            )
        ) {
            $current =
                adc_audit_engine_resolve_redirect(
                    $current,
                    $headers['location']
                );

            if ($current === '') {
                break;
            }

            continue;
        }

        return [
            'ok' => true,
            'url' => $current,
            'status' => $status,
            'content_type' =>
                $contentType,
            'headers' => $headers,
            'html' => $body,
            'elapsed_ms' =>
                $elapsedMs,
        ];
    }

    return [
        'ok' => false,
        'error' =>
            'O site redirecionou demasiadas vezes.',
    ];
}

function adc_audit_engine_recommendation(
    string $id
): string {
    $map = [
        'https' =>
            'Ative HTTPS e redirecione todo o tráfego HTTP para a versão segura.',
        'title' =>
            'Defina um título único, descritivo e orientado à intenção de pesquisa da página.',
        'description' =>
            'Adicione uma meta description clara que explique a proposta e incentive o clique.',
        'h1' =>
            'Mantenha um único H1 principal que descreva claramente o conteúdo da página.',
        'mobile' =>
            'Configure o viewport e valide a experiência em ecrãs pequenos.',
        'canonical' =>
            'Defina uma URL canónica para reduzir ambiguidades de indexação.',
        'indexable' =>
            'Remova noindex quando a página deve aparecer nos motores de pesquisa.',
        'social' =>
            'Configure Open Graph para controlar título e descrição ao partilhar a página.',
        'schema' =>
            'Adicione dados estruturados JSON-LD adequados ao negócio e à página.',
        'images' =>
            'Adicione texto alternativo útil às imagens que transmitem informação.',
        'conversion' =>
            'Inclua uma ação principal clara: contacto, orçamento, marcação, compra ou pedido.',
    ];

    return
        $map[$id]
        ?? 'Reveja este ponto e valide o impacto antes de alterar a página.';
}

function adc_audit_engine_run(
    string $rawUrl
): array {
    if (
        !function_exists(
            'curl_init'
        )
    ) {
        return [
            'ok' => false,
            'error' =>
                'O servidor não tem suporte cURL disponível.',
        ];
    }

    $url =
        adc_audit_engine_normalize_url(
            $rawUrl
        );

    [$valid, $validationError] =
        adc_audit_engine_validate_url(
            $url
        );

    if (!$valid) {
        return [
            'ok' => false,
            'error' =>
                $validationError,
        ];
    }

    $fetched =
        adc_audit_engine_fetch(
            $url
        );

    if (
        empty(
            $fetched['ok']
        )
    ) {
        return $fetched;
    }

    $statusCode =
        (int) (
            $fetched['status']
            ?? 0
        );

    if (
        $statusCode < 200
        || $statusCode >= 400
    ) {
        return [
            'ok' => false,
            'error' =>
                in_array(
                    $statusCode,
                    [401, 403],
                    true
                )
                    ? 'O site bloqueou a análise automática.'
                    : 'O site respondeu com o código HTTP '
                        . $statusCode
                        . '.',
        ];
    }

    $contentType =
        strtolower(
            (string) (
                $fetched['content_type']
                ?? ''
            )
        );

    if (
        $contentType !== ''
        && !str_contains(
            $contentType,
            'text/html'
        )
        && !str_contains(
            $contentType,
            'application/xhtml+xml'
        )
    ) {
        return [
            'ok' => false,
            'error' =>
                'O endereço não devolveu uma página HTML.',
        ];
    }

    $html =
        (string) (
            $fetched['html']
            ?? ''
        );

    if ($html === '') {
        return [
            'ok' => false,
            'error' =>
                'O site não devolveu conteúdo analisável.',
        ];
    }

    libxml_use_internal_errors(
        true
    );

    $dom =
        new DOMDocument();

    $loaded =
        @$dom->loadHTML(
            $html,
            LIBXML_NOWARNING
            | LIBXML_NOERROR
        );

    libxml_clear_errors();

    if (!$loaded) {
        return [
            'ok' => false,
            'error' =>
                'Não foi possível interpretar o HTML do site.',
        ];
    }

    $xpath =
        new DOMXPath($dom);

    $meta =
        static function (
            DOMXPath $xpath,
            string $name
        ): string {
            $nodes =
                $xpath->query(
                    '//meta['
                    . 'translate(@name,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz")="'
                    . strtolower($name)
                    . '"]/@content'
                );

            return
                $nodes
                && $nodes->length
                    ? trim(
                        (string) $nodes
                            ->item(0)
                            ->nodeValue
                    )
                    : '';
        };

    $propertyMeta =
        static function (
            DOMXPath $xpath,
            string $property
        ): string {
            $nodes =
                $xpath->query(
                    '//meta['
                    . 'translate(@property,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz")="'
                    . strtolower($property)
                    . '"]/@content'
                );

            return
                $nodes
                && $nodes->length
                    ? trim(
                        (string) $nodes
                            ->item(0)
                            ->nodeValue
                    )
                    : '';
        };

    $titleNodes =
        $xpath->query('//title');

    $title =
        $titleNodes
        && $titleNodes->length
            ? trim(
                preg_replace(
                    '/\s+/u',
                    ' ',
                    (string) $titleNodes
                        ->item(0)
                        ->textContent
                )
            )
            : '';

    $description =
        $meta(
            $xpath,
            'description'
        );

    $robots =
        strtolower(
            $meta(
                $xpath,
                'robots'
            )
        );

    $h1Nodes =
        $xpath->query('//h1');

    $h1Count =
        $h1Nodes
            ? $h1Nodes->length
            : 0;

    $canonicalNodes =
        $xpath->query(
            '//link['
            . 'contains('
            . 'concat(" ",normalize-space(translate(@rel,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz"))," "),'
            . '" canonical "'
            . ')'
            . ']/@href'
        );

    $canonical =
        $canonicalNodes
        && $canonicalNodes->length
            ? trim(
                (string) $canonicalNodes
                    ->item(0)
                    ->nodeValue
            )
            : '';

    $viewport =
        $meta(
            $xpath,
            'viewport'
        );

    $schemaNodes =
        $xpath->query(
            '//script['
            . 'translate(@type,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz")="application/ld+json"'
            . ']'
        );

    $schemaCount =
        $schemaNodes
            ? $schemaNodes->length
            : 0;

    $images =
        $xpath->query('//img');

    $imageCount =
        $images
            ? $images->length
            : 0;

    $missingAlt = 0;

    if ($images) {
        foreach ($images as $image) {
            if (
                !$image->hasAttribute(
                    'alt'
                )
                || trim(
                    (string) $image
                        ->getAttribute(
                            'alt'
                        )
                ) === ''
            ) {
                $missingAlt++;
            }
        }
    }

    $ogTitle =
        $propertyMeta(
            $xpath,
            'og:title'
        );

    $ogDescription =
        $propertyMeta(
            $xpath,
            'og:description'
        );

    $bodyText =
        strtolower(
            preg_replace(
                '/\s+/u',
                ' ',
                strip_tags($html)
            )
        );

    $hasContactSignal =
        preg_match(
            '/\b(contact|contacto|contato|whatsapp|reservar|marcar|orçamento|orcamento|quote|budget|book|comprar|buy|checkout)\b/u',
            $bodyText
        ) === 1;

    $checks = [];

    $add =
        static function (
            string $id,
            string $label,
            bool $passed,
            int $weight,
            string $detail
        ) use (
            &$checks
        ): void {
            $checks[] = [
                'id' => $id,
                'label' => $label,
                'passed' => $passed,
                'weight' => $weight,
                'detail' => $detail,
                'recommendation' =>
                    adc_audit_engine_recommendation(
                        $id
                    ),
            ];
        };

    $scheme =
        strtolower(
            (string) parse_url(
                (string) $fetched['url'],
                PHP_URL_SCHEME
            )
        );

    $add(
        'https',
        'HTTPS ativo',
        $scheme === 'https',
        12,
        $scheme === 'https'
            ? 'Ligação segura detetada.'
            : 'O endereço final não está em HTTPS.'
    );

    $titleLen =
        function_exists(
            'mb_strlen'
        )
            ? mb_strlen($title)
            : strlen($title);

    $add(
        'title',
        'Título SEO',
        $title !== ''
            && $titleLen >= 20
            && $titleLen <= 70,
        12,
        $title === ''
            ? 'Não foi encontrado um título HTML.'
            : 'Título com '
                . $titleLen
                . ' caracteres.'
    );

    $descLen =
        function_exists(
            'mb_strlen'
        )
            ? mb_strlen(
                $description
            )
            : strlen(
                $description
            );

    $add(
        'description',
        'Meta description',
        $description !== ''
            && $descLen >= 60
            && $descLen <= 180,
        12,
        $description === ''
            ? 'Meta description não encontrada.'
            : 'Descrição com '
                . $descLen
                . ' caracteres.'
    );

    $add(
        'h1',
        'Estrutura H1',
        $h1Count === 1,
        10,
        $h1Count === 1
            ? 'Existe um H1 principal.'
            : 'Foram encontrados '
                . $h1Count
                . ' elementos H1.'
    );

    $add(
        'mobile',
        'Preparação mobile',
        $viewport !== '',
        10,
        $viewport !== ''
            ? 'Viewport configurado.'
            : 'Meta viewport não encontrada.'
    );

    $add(
        'canonical',
        'URL canónica',
        $canonical !== '',
        10,
        $canonical !== ''
            ? 'Canonical encontrada.'
            : 'Canonical não encontrada.'
    );

    $indexable =
        !str_contains(
            $robots,
            'noindex'
        );

    $add(
        'indexable',
        'Indexação',
        $indexable,
        12,
        $indexable
            ? 'Não foi detetado noindex.'
            : 'Foi detetada instrução noindex.'
    );

    $socialOk =
        $ogTitle !== ''
        && $ogDescription !== '';

    $add(
        'social',
        'Partilha social',
        $socialOk,
        8,
        $socialOk
            ? 'Open Graph principal configurado.'
            : 'Open Graph está incompleto.'
    );

    $add(
        'schema',
        'Dados estruturados',
        $schemaCount > 0,
        7,
        $schemaCount > 0
            ? $schemaCount
                . ' bloco(s) JSON-LD encontrado(s).'
            : 'Nenhum JSON-LD encontrado.'
    );

    $altPass =
        $imageCount === 0
        || $missingAlt <=
            max(
                1,
                (int) floor(
                    $imageCount
                    * 0.2
                )
            );

    $add(
        'images',
        'Texto alternativo em imagens',
        $altPass,
        7,
        $imageCount === 0
            ? 'Nenhuma imagem encontrada nesta página.'
            : $missingAlt
                . ' de '
                . $imageCount
                . ' imagem(ns) sem alt útil.'
    );

    $add(
        'conversion',
        'Sinal de contacto/conversão',
        $hasContactSignal,
        5,
        $hasContactSignal
            ? 'Foi encontrado pelo menos um sinal de contacto ou ação.'
            : 'Não foi encontrado um sinal claro de contacto/ação no texto.'
    );

    $totalWeight =
        array_sum(
            array_column(
                $checks,
                'weight'
            )
        );

    $earned = 0;

    foreach ($checks as $check) {
        if ($check['passed']) {
            $earned +=
                $check['weight'];
        }
    }

    $score =
        $totalWeight > 0
            ? (int) round(
                (
                    $earned
                    / $totalWeight
                )
                * 100
            )
            : 0;

    $issues =
        array_values(
            array_filter(
                $checks,
                static fn($check) =>
                    !$check['passed']
            )
        );

    usort(
        $issues,
        static fn($a, $b) =>
            $b['weight']
            <=>
            $a['weight']
    );

    $elapsedMs =
        (int) (
            $fetched['elapsed_ms']
            ?? 0
        );

    return [
        'ok' => true,
        'url' =>
            (string) $fetched['url'],
        'status' =>
            $statusCode,
        'score' => $score,
        'summary' => [
            'passed' =>
                count($checks)
                - count($issues),
            'total' =>
                count($checks),
            'response_ms' =>
                $elapsedMs,
            'performance_note' =>
                $elapsedMs <= 1200
                    ? 'Resposta inicial rápida nesta medição.'
                    : (
                        $elapsedMs <= 2500
                            ? 'Resposta inicial moderada nesta medição.'
                            : 'Resposta inicial lenta nesta medição.'
                    ),
        ],
        'checks' => $checks,
        'top_issues' =>
            array_slice(
                $issues,
                0,
                5
            ),
        'page' => [
            'title' => $title,
            'description' =>
                $description,
            'h1_count' =>
                $h1Count,
            'canonical' =>
                $canonical,
            'image_count' =>
                $imageCount,
            'missing_alt_count' =>
                $missingAlt,
            'schema_count' =>
                $schemaCount,
        ],
        'notice' =>
            'A análise automática avalia sinais observáveis na página inicial. Não substitui testes de campo, dados analíticos ou uma auditoria manual completa.',
    ];
}
