<?php
/**
 * @link http://www.yee-soft.com/
 * @copyright Copyright (c) 2015 Taras Makitra
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

namespace yeesoft\post;

/**
 * Post Module For Yee CMS
 *
 * @author Taras Makitra <makitrataras@gmail.com>
 */
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