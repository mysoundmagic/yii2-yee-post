<?php

namespace yeesoft\post\controllers;

use yeesoft\post\models\Post;
use yeesoft\post\models\PostSearch;
use yeesoft\base\controllers\AdminDefaultController;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends AdminDefaultController {

    public $modelClass = 'common\models\Post';
    public $modelSearchClass = 'common\models\search\PostSearch';

    protected function getRedirectPage($action, $model = null) {
        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }

}
