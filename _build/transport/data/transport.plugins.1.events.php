<?php

/** @var modX $modx */

$pluginEventsProperties = [
    [
        'event' => 'OnMODXInit',
        'priority' => 0,
        'propertyset' => 0,
    ],
];

$pluginEvents = [];
foreach ($pluginEventsProperties as $pluginEventProperties) {
    /** @var modPluginEvent $pluginEvent */
    $pluginEvent = $modx->newObject(modPluginEvent::class);
    $pluginEvent->fromArray($pluginEventProperties, '', true, true);
    $pluginEvents[$pluginEvent->get('event')] = $pluginEvent;
}

return $pluginEvents;