<?php

use yeesoft\helpers\Html;
use yeesoft\models\User;
use yeesoft\post\PostModule;
use yeesoft\Yee;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => PostModule::t('post', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>

    <div class="panel panel-default">
        <div class="panel-body">

            <p>
                <?= Html::a(Yee::t('yee', 'Edit'), ['/post/default/update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>

                <?= Html::a(Yee::t('yee', 'Delete'), ['/post/default/delete', 'id' => $model->id], [
                    'class' => 'btn btn-sm btn-default',
                    'data' => [
                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>

                <?= Html::a(Yee::t('yee', 'Add New'), ['/post/default/create'], ['class' => 'btn btn-sm btn-primary pull-right']) ?>
            </p>


            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'author',
                        'value' => $model->author->username,
                        'visible' => User::hasPermission('viewUserEmail'),
                    ],
                    'slug',
                    [
                        'attribute' => 'status',
                        'value' => $model->statusText,
                    ],
                    [
                        'attribute' => 'comment_status',
                        'value' => $model->commentStatusText,
                    ],
                    'revision',
                    [
                        'attribute' => 'published_at',
                        'value' => $model->publishedDate,
                    ],
                    [
                        'attribute' => 'updated_at',
                        'value' => $model->updatedTime,
                    ],
                    [
                        'attribute' => 'created_at',
                        'value' => $model->createdDate,
                    ],
                ],
            ])
            ?>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <h2><?= $model->title ?></h2>
            <?= $model->content ?>
        </div>
    </div>


</div>
