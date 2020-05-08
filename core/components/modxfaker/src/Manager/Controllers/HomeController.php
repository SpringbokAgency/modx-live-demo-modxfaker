<?php


namespace SpringbokAgency\MODX\Faker\Manager\Controllers;


class HomeController extends Controller
{

    public function getPageTitle()
    {
        return $this->modx->lexicon($this->faker->config['namespace'] . '.home.page_title');
    }

    public function loadCustomCssJs()
    {
        $this->addJavascript($this->faker->config['assets_url'] . 'js/mgr/widgets/home.panel.js');
        $this->addLastJavascript($this->faker->config['assets_url'] . 'js/mgr/sections/index.js');
    }

    public function getTemplateFile()
    {
        return $this->faker->config['templates_path'] . 'home.tpl';
    }

    public function checkPermissions()
    {
        return true;
    }
}