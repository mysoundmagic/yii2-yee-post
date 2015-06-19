<?php

namespace yeesoft\post;

class PostModule extends \yii\base\Module
{
    /**
     * Table aliases
     *
     * @var string
     */
    public $post_table          = '{{%post}}';
    public $controllerNamespace = 'yeesoft\post\controllers';

    /**
     * @p
     */
    public function init()
    {
        parent::init();
    }
}