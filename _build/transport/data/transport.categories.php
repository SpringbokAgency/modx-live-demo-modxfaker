<?php

/** @var modX $modx */
/** @var modCategory $category */
$category = $modx->newObject(modCategory::class);
$category->fromArray([
    'id' => 1,
    'category' => PACKAGE_NAME,
], '', true, true);

$plugins = include_once $transportDataPath . 'transport.plugins.php';
if (!empty($plugins)) {
    $category->addMany($plugins, 'Plugins');
}

$categoryAttributes = [
    xPDOTransport::UNIQUE_KEY => 'category',
    xPDOTransport::PRESERVE_KEYS => false,
    xPDOTransport::UPDATE_OBJECT => true,
    xPDOTransport::RELATED_OBJECTS => true,
    xPDOTransport::RELATED_OBJECT_ATTRIBUTES => [
        'Snippets' => [
            xPDOTransport::PRESERVE_KEYS => false,
            xPDOTransport::UPDATE_OBJECT => true,
            xPDOTransport::UNIQUE_KEY => 'name',
        ],
        'Chunks' => [
            xPDOTransport::PRESERVE_KEYS => false,
            xPDOTransport::UPDATE_OBJECT => true,
            xPDOTransport::UNIQUE_KEY => 'name',
        ],
        'Plugins' => [
            xPDOTransport::PRESERVE_KEYS => false,
            xPDOTransport::UPDATE_OBJECT => true,
            xPDOTransport::UNIQUE_KEY => 'name',
            xPDOTransport::RELATED_OBJECTS => true,
            xPDOTransport::RELATED_OBJECT_ATTRIBUTES => [
                'PluginEvents' => [
                    xPDOTransport::PRESERVE_KEYS => true,
                    xPDOTransport::UPDATE_OBJECT => false,
                    xPDOTransport::UNIQUE_KEY => [
                        'pluginid',
                        'event',
                    ],
                ],
            ],
        ],
    ],
];

$categoryVehicle = $builder->createVehicle($category, $categoryAttributes);

return $categoryVehicle;