<?php

namespace yeesoft\post\widgets\dashboard;

use yeesoft\post\models\Post;
use yeesoft\post\models\search\PostSearch;

class Posts extends \yii\base\Widget
{
    /**
     * Widget Height
     */
    public $widgetHeight = 'auto';

    /**
     * Widget Width
     */
    public $widgetWidth = '4';

    /**
     * Most recent post limit
     */
    public $recentLimit = 5;

    /**
     * Post index action
     */
    public $indexAction = 'post/default/index';

    /**
     * Total post options
     *
     * @var array
     */
    public $options = [
        ['label' => 'Published', 'icon' => 'ok', 'filterWhere' => ['status' => Post::STATUS_PUBLISHED]],
        ['label' => 'Pending', 'icon' => 'search', 'filterWhere' => ['status' => Post::STATUS_PENDING]],
    ];

    public function run()
    {
        $searchModel = new PostSearch();
        $formName = $searchModel->formName();

        $recentPosts = Post::find()->orderBy(['id' => SORT_DESC])->limit($this->recentLimit)->all();

        foreach ($this->options as &$option) {
            $count = Post::find()->filterWhere($option['filterWhere'])->count();
            $option['count'] = $count;
            $option['url'] = [$this->indexAction, $formName => $option['filterWhere']];
        }

        return $this->render('posts', [
            'widgetHeight' => $this->widgetHeight,
            'widgetWidth' => $this->widgetWidth,
            'posts' => $this->options,
            'recentPosts' => $recentPosts,
        ]);
    }
}