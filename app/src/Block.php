<?php

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\Security\Permission;
use SilverStripe\Core\Injector\Injector;


class Block extends DataObject
{

    #######################
    ### Names Section
    #######################

    private static $singular_name = 'Block';

    public function i18n_singular_name()
    {
        return _t(self::class.'.SINGULAR_NAME', 'Block');
    }

    private static $plural_name = 'Blocks';

    public function i18n_plural_name()
    {
        return _t(self::class.'.PLURAL_NAME', 'Blocks');
    }

    private static $table_name = 'Block';


    #######################
    ### Model Section
    #######################

    private static $db = [
        //'Title' => 'Varchar',
        'HTMLText' => 'HTMLText',
        'TextColour' => 'Varchar',
        'BackgroundColour' => 'Varchar',
        'SortNumber' => 'Int'
    ];

    private static $has_one = [
        'Icon' => Image::class,
        'Image' => Image::class,
        'MyElement' => MyElement::class
    ];


    #######################
    ### Further DB Field Details
    #######################


    private static $owns = [
        'Icon',
        'Image',
    ];


    private static $indexes = [
        'SortNumber' => true
    ];

    private static $default_sort = [
        'SortNumber' => 'ASC'
    ];


    #######################
    ### Field Names and Presentation Section
    #######################

    private static $field_labels = [
        'BackgroundColour' => 'Background Colour',
        'Image' => 'Full-size Image',
        'Icon' => 'Above Text Icon'
    ];

    private static $field_labels_right = [
        'Image' => 'Square, at least 500px wide / high'
    ];

    // private static $summary_fields = [
    //     'Title.Title' => 'Title',
    //     'PreviewHTML.Title' => 'Preview'
    // ];


    #######################
    ### Casting Section
    #######################

    private static $casting = [
        'Title' => 'Varchar',
        'PreviewHTML' => 'Varchar'
    ];

    public function getTitle()
    {
        return DBField::create_field('Varchar', 'my title');
    }

    public function getPreviewHTML()
    {
        return DBField::create_field('HTMLText', 'my preview');
    }



    #######################
    ### can Section
    #######################


    private static $primary_model_admin_class = BlockAdmin::class;





    #######################
    ### write Section
    #######################
    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        //...
    }

    public function onAfterWrite()
    {
        parent::onAfterWrite();
        //...
    }

    public function requireDefaultRecords()
    {
        parent::requireDefaultRecords();
        //...
    }


    #######################
    ### Import / Export Section
    #######################

    public function getExportFields()
    {
        //..
        return parent::getExportFields();
    }



    #######################
    ### CMS Edit Section
    #######################


    public function CMSEditLink()
    {
        $controller = Injector::inst($this->Config()->get('primary_model_admin_class'));

        return $controller->Link().$this->ClassName."/EditForm/field/".$this->ClassName."/item/".$this->ID."/edit";
    }

    public function CMSAddLink()
    {
        $controller = Injector::inst($this->Config()->get('primary_model_admin_class'));

        return $controller->Link().$this->ClassName."/EditForm/field/".$this->ClassName."/item/new";
    }


    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        //do first??
        $rightFieldDescriptions = $this->Config()->get('field_labels_right');
        if(is_array($rightFieldDescriptions) && count($rightFieldDescriptions)) {
            foreach($rightFieldDescriptions as $field => $desc) {
                $formField = $fields->DataFieldByName($field);
                if(! $formField) {
                    $formField = $fields->DataFieldByName($field.'ID');
                }
                if($formField) {
                    $formField->setDescription($desc);
                }
            }
        }
        //...

        return $fields;
    }


}
