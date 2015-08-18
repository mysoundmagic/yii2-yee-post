<?php

use yeesoft\helpers\Html;
use yeesoft\models\User;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>

    <div class="panel panel-default">
        <div class="panel-body">

            <p>
                <?=
                Html::a('Edit', ['update', 'id' => $model->id],
                    ['class' => 'btn btn-sm btn-primary'])
                ?>
                <?=
                Html::a('Delete', ['delete', 'id' => $model->id],
                    [
                        'class' => 'btn btn-sm btn-default',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this user?',
                            'method' => 'post',
                        ],
                    ])
                ?>
                <?=
                Html::a('Add New', ['create'],
                    ['class' => 'btn btn-sm btn-primary pull-right'])
                ?>
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
