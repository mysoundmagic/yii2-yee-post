<?php

namespace yeesoft\post;

class PostModule extends \yii\base\Module
{
    /**
     * Version number of the module.
     */
    const VERSION = '0.1-a';
    
    /**
     * Table aliases
     *
     * @var string
     */
    public $post_table = '{{%post}}';
    public $controllerNamespace = 'yeesoft\post\controllers';

}