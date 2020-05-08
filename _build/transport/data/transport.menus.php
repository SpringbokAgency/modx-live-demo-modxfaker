<?php

/** @var modX $modx */
/** @var modMenu $menu */
$menu = $modx->newObject(modMenu::class);
$menu->fromArray([
    'text' => PACKAGE_LOWERCASE_NAME,
    'parent' => 'components',
    'action' => 'home',
    'description' => PACKAGE_LOWERCASE_NAME . '.description',
    'menuindex' => 0,
    'namespace' => PACKAGE_LOWERCASE_NAME,
], '', true, true);

$menuAttributes = [
    xPDOTransport::PRESERVE_KEYS => true,
    xPDOTransport::UPDATE_OBJECT => true,
    xPDOTransport::UNIQUE_KEY => 'text',
    xPDOTransport::RELATED_OBJECTS => false,
];

$menuVehicle = $builder->createVehicle($menu, $menuAttributes);

return $menuVehicle;