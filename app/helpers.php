<?php

if (!function_exists('module_path')) {
    function module_path(string $name, string $path = ''): string
    {
        $modulePath = base_path("Modules/{$name}");
        return $path ? $modulePath . '/' . ltrim($path, '/') : $modulePath;
    }
}
