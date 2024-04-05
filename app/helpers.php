<?php

declare(strict_types=1);

if (!function_exists('active_link')) {
    function active_link(string $route, string $active = 'active'): string {
        return request()->routeIs($route)? $active : '';
    }
}
