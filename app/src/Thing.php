<?php

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;


class Thing extends DataObject
{

    private static $db = [
        'HTMLText' => 'HTMLText',
    ];

    private static $has_one = [
        'Image' => Image::class,
        'MyElement' => MyElement::class
    ];

    private static $owns = [
        'Image',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }


}
