<?php


namespace SpringbokAgency\MODX\Faker\Processors;


class PopulateProcessor extends \modProcessor
{

    public function process()
    {
        $amount = intval($this->getProperty('amount', 10));
        $this->createFakeResources($amount);

        return $this->success();
    }

    protected function createFakeResources($amount = 1)
    {
        if ($amount <= 0) {
            $amount = 1;
        }

        $faker = \Faker\Factory::create();
        $populator = new \SpringbokAgency\Faker\ORM\xPDO\Populator($faker, $this->modx);

        // We can specify a custom closure to be used for populating a particular column.
        // The columns with `null` as value will be ignored during population.
        // See the Faker documentation for more information: https://github.com/fzaninotto/Faker#populating-entities-using-an-orm-or-an-odm

        $columnsToIgnore = [
            'type' => null,
            'contentType' => null,
            'alias' => null,
            'alias_visible' => null,
            'link_attributes' => null,
            'richtext' => null,
            'menuindex' => null,
            'searchable' => null,
            'cacheable' => null,
            'donthit' => null,
            'privateweb' => null,
            'privatemgr' => null,
            'content_dispo' => null,
            'hidemenu' => null,
            'class_key' => null,
            'context_key' => null,
            'content_type' => null,
            'uri' => null,
            'uri_override' => null,
            'hide_children_in_tree' => null,
            'show_in_tree' => null,
            'properties' => null,
        ];

        $customColumnFormatters = array_merge($columnsToIgnore, [
            'introtext' => function() use ($faker) {
                return $faker->paragraph();
            },
        ]);
        $populator->addEntity(\modResource::class, $amount, $customColumnFormatters);
        $populator->execute();
    }
}