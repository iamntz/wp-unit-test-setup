<?php

spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    $class_path = __DIR__ . DIRECTORY_SEPARATOR . strtolower(str_replace('_', '-', $class_name));
    $class_path = preg_replace('~([^\\\\]+$)~', '$1.php', $class_path);

    if (file_exists($class_path)) {
        include $class_path;
    }
});
