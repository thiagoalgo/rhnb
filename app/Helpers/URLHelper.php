<?php

if (!function_exists('currentDomain')) {
    function currentDomain(bool $withProtocol = false): bool|string
    {
        $tenant = tenant();

        if (!is_null($tenant)) {
            $domain = $tenant->id . '.' . parse_url(env('APP_URL'), PHP_URL_HOST);

            if ($withProtocol) {
                $domain = parse_url(env('APP_URL'), PHP_URL_SCHEME) . '://' . $domain;
            }

            return $domain;
        }

        return false;
    }
}
