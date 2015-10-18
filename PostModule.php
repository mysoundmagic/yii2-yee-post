<?php

namespace yeesoft\post;

use Yii;

class PostModule extends \yii\base\Module
{
    /**
     * Table aliases
     *
     * @var string
     */
    public $post_table = '{{%post}}';
    public $controllerNamespace = 'yeesoft\post\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['yii2-yee-post/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@vendor/yeesoft/yii2-yee-post/messages',
            'fileMap' => [
                'yii2-yee-post/post' => 'post.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('yii2-yee-post/' . $category, $message, $params, $language);
    }
}