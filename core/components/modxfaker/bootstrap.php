<?php

require_once dirname(__FILE__) . '/vendor/autoload.php';

/** @var modX $modx */

$packageLowercaseName = basename(dirname(__FILE__));

/** @var modNamespace $packageNamespace */
$packageNamespace = $modx->getObject(modNamespace::class, [
    'name' => $packageLowercaseName,
]);
if ($packageNamespace === null) {
    $modx->log(MODX_LOG_LEVEL_ERROR, 'Namespace not found for package "' . $packageLowercaseName . '"');
    return false;
}
$packageCorePath = $packageNamespace->getCorePath();

$modx->addPackage($packageLowercaseName, $packageCorePath . 'model');

$modx->getService(
    'faker',
    \Faker::class,
    $packageCorePath . 'model/' . $packageLowercaseName . '/',
    [
        'namespace' => $packageNamespace,
    ]
);

// Basically `modX::_loadExtensionPackages()`