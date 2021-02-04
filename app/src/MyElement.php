<?php

use DNADesign\Elemental\Models\BaseElement;

class MyElement extends BaseElement
{
    private static $singular_name = 'my element';

    private static $plural_name = 'my elements';

    private static $description = 'What my custom element does';

    private static $has_many = [
        'Blocks' => Block::class,
    ];

    private static $inline_editable = false;

	public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // ...

        return $fields;
    }

    public function getType()
    {
        return 'My Element';
    }
}