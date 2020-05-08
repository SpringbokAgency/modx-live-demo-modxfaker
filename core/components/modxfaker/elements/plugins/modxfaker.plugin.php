<?php

require_once dirname(dirname(dirname($this->getSourceFile()))) . '/bootstrap.php';

$faker = $modx->getService('faker');
if (!$faker instanceof \Faker) {
    return;
}