<?php

use SilverStripe\Admin\ModelAdmin;

class ThingAdmin extends ModelAdmin
{
    private static $managed_models = [
        Thing::class,
    ];



    private static $menu_title = 'things';

    private static $url_segment = 'things';




}