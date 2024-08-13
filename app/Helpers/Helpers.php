<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('routeActive')) {
    function routeActive($route) {
        if (str_contains(request()->route()->getName(), $route)) {
            return 'active';
        }
    }
}

if (!function_exists('whoami')) {
    function whoami() {
        return Session::get('user_info');
    }
}

if (!function_exists('isSuperadmin')) {
    function isSuperadmin() {
        if (whoami()['role_name'] === 'Superadmin') {
            return true;
        }
        return false;
    }
}