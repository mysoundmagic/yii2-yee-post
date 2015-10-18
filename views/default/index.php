<?php

use webvimark\extensions\GridPageSize\GridPageSize;
use yeesoft\grid\GridQuickLinks;
use yeesoft\grid\GridView;
use yeesoft\helpers\Html;
use yeesoft\models\User;
use yeesoft\post\models\Post;
use yeesoft\post\PostModule;
use yeesoft\Yee;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel yeesoft\post\models\search\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = PostModule::t('post', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?= Html::encode($this->title) ?></h3>
            <?= Html::a(Yee::t('yee', 'Add New'), ['/post/default/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">
                    <?= GridQuickLinks::widget([
                        'model' => Post::class,
                        'searchModel' => $searchModel,
                        'labels' => [
                            'all' => Yee::t('yee', 'All'),
                            'active' => Yee::t('yee', 'Published'),
                            'inactive' => Yee::t('yee', 'Pending'),
                        ]
                    ]) ?>
                </div>

                <div class="col-sm-6 text-right">
                    <?= GridPageSize::widget(['pjaxId' => 'post-grid-pjax']) ?>
                </div>
            </div>

            <?php
            Pjax::begin([
                'id' => 'post-grid-pjax',
            ])
            ?>

            <?=
            GridView::widget([
                'id' => 'post-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'post-grid',
                    'actions' => [
                        Url::to(['bulk-activate']) => Yee::t('yee', 'Publish'),
                        Url::to(['bulk-deactivate']) => Yee::t('yee', 'Unpublish'),
                        Url::to(['bulk-delete']) => Yii::t('yii', 'Delete'),
                    ]
                ],
                'columns' => [
                    ['class' => 'yii\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'controller' => '/post/default',
                        'title' => function (Post $model) {
                            return Html::a($model->title, ['/post/default/view', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                    ],
                    [
                        'attribute' => 'created_by',
                        'filter' => yeesoft\models\User::getUsersList(),
                        'filterInputOptions' => [],
                        'value' => function (Post $model) {
                            return Html::a($model->author->username,
                                ['/user/default/view', 'id' => $model->created_by],
                                ['data-pjax' => 0]);
                        },
                        'format' => 'raw',
                        'visible' => User::hasPermission('viewUsers'),
                        'options' => ['style' => 'width:180px'],
                    ],
                    [
                        'class' => 'yeesoft\grid\columns\StatusColumn',
                        'attribute' => 'status',
                        'optionsArray' => Post::getStatusOptionsList(),
                        'options' => ['style' => 'width:60px'],
                    ],
                    [
                        'class' => 'yeesoft\grid\columns\DateFilterColumn',
                        'attribute' => 'published_at',
                        'value' => function (Post $model) {
                            return '<span style="font-size:85%;" class="label label-'
                            . ((time() >= $model->published_at) ? 'primary' : 'default') . '">'
                            . $model->publishedDate . '</span>';
                        },
                        'format' => 'raw',
                        'options' => ['style' => 'width:150px'],
                    ],
                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


