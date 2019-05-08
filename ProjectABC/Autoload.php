<?php
spl_autoload_register(function($class) {
    $classPath = str_replace('ProjectABC', '', $class);
    include __DIR__ . '/'. str_replace('\\', '/', $classPath) . '.php';
});
