<?php


namespace SpringbokAgency\MODX\Faker\Manager\Controllers;


use SpringbokAgency\MODX\Faker\Faker;

abstract class Controller extends \modExtraManagerController
{
    /** @var Faker */
    protected $faker;

    public function initialize()
    {
        $this->faker = $this->modx->getService('faker');

        $this->addJavascript($this->faker->config['assets_url'] . 'js/mgr/modxfaker.js');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            Modxfaker.config = ' . $this->modx->toJSON($this->faker->config) . ';
        });
        </script>');
    }

    public function getLanguageTopics()
    {
        return [
            $this->faker->config['namespace'] . ':default',
        ];
    }
}