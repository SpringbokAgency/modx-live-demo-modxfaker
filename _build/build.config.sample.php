<?php

/* define the MODX path constants */
define('MODX_CORE_PATH', '/path/to/modx/core/');
define('MODX_CONFIG_KEY', 'config');

define('PACKAGE_NAME', 'MODX Faker');
define('PACKAGE_LOWERCASE_NAME', 'modxfaker');
define('PACKAGE_VERSION', '0.1.0');
define('PACKAGE_RELEASE', 'dev');

define('PACKAGE_CORE_PATH', dirname(dirname(__FILE__)) . '/core/components/' . PACKAGE_LOWERCASE_NAME. '/');
define('PACKAGE_NAMESPACE_CORE_PATH', '{core_path}components/' . PACKAGE_LOWERCASE_NAME. '/');

define('PACKAGE_ASSETS_PATH', dirname(dirname(__FILE__)) . '/assets/components/' . PACKAGE_LOWERCASE_NAME. '/');
define('PACKAGE_NAMESPACE_ASSETS_PATH', '{assets_path}components/' . PACKAGE_LOWERCASE_NAME. '/');