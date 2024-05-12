<?php

if (!function_exists('routeActive')) {
    function routeActive($route) {
        if (request()->route()->getName() == $route) {
            return 'active';
        }
    }
}