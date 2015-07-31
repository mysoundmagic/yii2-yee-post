<?php

namespace yeesoft\post\widgets\dashboard;

use yeesoft\post\models\Post;
use yeesoft\post\models\search\PostSearch;

class Posts extends \yii\base\Widget
{
    /**
     * Widget height
     */
    public $height = 'auto';

    /**
     * Widget width
     */
    public $width = '8';

    /**
     * Widget position
     *
     * @var string
     */
    public $position = 'left';

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
            'height' => $this->height,
            'width' => $this->width,
            'position' => $this->position,
            'posts' => $this->options,
            'recentPosts' => $recentPosts,
        ]);
    }
}