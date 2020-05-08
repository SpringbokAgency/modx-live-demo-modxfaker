<?php

/** @var modX $modx */

$pluginsProperties = [
    [
        'id' => 1,
        'source' => 1,
        'name' => PACKAGE_NAME . ' Bootstrap',
        'description' => 'Bootstrap the extra',
        'category' => 0,
        'locked' => true,
        'static' => true,
        'static_file' => 'core/components/' . PACKAGE_LOWERCASE_NAME . '/elements/plugins/' . PACKAGE_LOWERCASE_NAME . '.plugin.php',
    ],
];

$plugins = [];
foreach ($pluginsProperties as $pluginProperties) {
    /** @var modPlugin $plugin */
    $plugin = $modx->newObject(modPlugin::class);
    $plugin->fromArray($pluginProperties, '', true, true);

    $pluginEvents = include_once $transportDataPath . 'transport.plugins.' . $plugin->get('id') . '.events.php';
    if (!empty($pluginEvents)) {
        $plugin->addMany($pluginEvents, 'PluginEvents');
    }

    $plugins[] = $plugin;
}

return $plugins;