<?php

$_tests_dir = __DIR__ . '/wp-tests/tests/wordpress-tests-lib';

// Forward custom PHPUnit Polyfills configuration to PHPUnit bootstrap file.
$_phpunit_polyfills_path = getenv('WP_TESTS_PHPUNIT_POLYFILLS_PATH');
if (false !== $_phpunit_polyfills_path) {
    define('WP_TESTS_PHPUNIT_POLYFILLS_PATH', $_phpunit_polyfills_path);
}

if (!file_exists("{$_tests_dir}/includes/functions.php")) {
    echo "Could not find {$_tests_dir}/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    exit(1);
}

spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    $class_path = __DIR__ . DIRECTORY_SEPARATOR . $class_name . '.php';
    if (file_exists($class_path)) {
        include $class_path;
    }
});


// Give access to tests_add_filter() function.
require_once "{$_tests_dir}/includes/functions.php";

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin()
{
    //require dirname(dirname(__FILE__)) . '/wp-content/plugins/advanced-custom-fields-pro/acf.php';
}

tests_add_filter('muplugins_loaded', '_manually_load_plugin');

require "{$_tests_dir}/includes/bootstrap.php";
