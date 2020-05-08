<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

/** @var modX $modx */
/** @var \SpringbokAgency\MODX\Faker\Faker $faker */
$faker = $modx->getService('faker');

/* handle request */
$modx->request->handleRequest([
    'processors_path' => $faker->config['processors_path'],
    'location' => '',
]);