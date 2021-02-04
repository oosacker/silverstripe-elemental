<?php

use SilverStripe\Admin\ModelAdmin;

class BlockAdmin extends ModelAdmin
{
    private static $managed_models = [
        Block::class,
    ];



    private static $menu_title = 'blocks';

    private static $url_segment = 'blocks';




}