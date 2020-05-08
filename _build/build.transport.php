<?php

$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
set_time_limit(0);

require_once dirname(__FILE__) . '/build.config.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';

$modx = new modX();
$modx->initialize('mgr');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

$modx->loadClass('transport.modPackageBuilder','',false, true);
$builder = new modPackageBuilder($modx);

$modx->log(xPDO::LOG_LEVEL_INFO, 'Beginning build script processes...');

$builder->createPackage(PACKAGE_NAME, PACKAGE_VERSION, PACKAGE_RELEASE);
$builder->registerNamespace(PACKAGE_LOWERCASE_NAME, false, true, PACKAGE_NAMESPACE_CORE_PATH, PACKAGE_NAMESPACE_ASSETS_PATH);

$builder->setPackageAttributes([
    'license' => file_get_contents(dirname(dirname(__FILE__)) . '/LICENSE'),
    'readme' => file_get_contents(dirname(dirname(__FILE__)) . '/README.md'),
    'changelog' => file_get_contents(dirname(dirname(__FILE__)) . '/CHANGELOG.md'),
]);

$transportDataPath = dirname(__FILE__) . '/transport/data/';
$transportResolversPath = dirname(__FILE__) . '/transport/resolvers/';

$vehicle = include_once $transportDataPath . 'transport.categories.php';

$vehicle->resolve('file', [
    'source' => rtrim(PACKAGE_CORE_PATH, '/'),
    'target' => "return MODX_CORE_PATH . 'components/';",
]);
$vehicle->resolve('file', [
    'source' => rtrim(PACKAGE_ASSETS_PATH, '/'),
    'target' => "return MODX_ASSETS_PATH . 'components/';",
]);

$builder->putVehicle($vehicle);

// @todo menu!
$vehicle = include_once $transportDataPath . 'transport.menus.php';
$builder->putVehicle($vehicle);

$builder->pack();

$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tend = $mtime;
$totalTime = ($tend - $tstart);
$totalTime = sprintf("%2.4f s", $totalTime);

$modx->log(modX::LOG_LEVEL_INFO, 'Package built! Execution time: ' . $totalTime);
exit();