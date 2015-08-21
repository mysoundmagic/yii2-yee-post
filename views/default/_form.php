<?php

use yeesoft\helpers\Html;
use yeesoft\media\widgets\TinyMce;
use yeesoft\models\User;
use yeesoft\post\models\Post;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yeesoft\post\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php
    $form = ActiveForm::begin([
        'id' => 'post-form',
        'validateOnBlur' => false,
    ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'content')->widget(TinyMce::className()); ?>

                </div>

            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <div class="form-group">
                            <label class="control-label" style="float: left; padding-right: 5px;">
                                <?= $model->attributeLabels()['created_at'] ?> :
                            </label>
                            <span><?= $model->createdDate ?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" style="float: left; padding-right: 5px;">
                                <?= $model->attributeLabels()['updated_at'] ?> :
                            </label>
                            <span><?= $model->updatedTime ?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" style="float: left; padding-right: 5px;">
                                <?= $model->attributeLabels()['revision'] ?> :
                            </label>
                            <span><?= $model->getRevision() ?></span>
                        </div>
                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>
                                <?= Html::submitButton('<span class="glyphicon glyphicon-plus-sign"></span> Create', ['class' => 'btn btn-primary']) ?>

                                <?= Html::a('<span class="glyphicon glyphicon-remove"></span> Cancel',
                                    ['/post/default/index'],
                                    ['class' => 'btn btn-default']
                                ) ?>
                            <?php else: ?>
                                <?= Html::submitButton('<span class="glyphicon glyphicon-ok"></span> Save', ['class' => 'btn btn-primary']) ?>

                                <?= Html::a('<span class="glyphicon glyphicon-remove"></span> Delete',
                                    ['/post/default/delete', 'id' => $model->id],
                                    [
                                        'class' => 'btn btn-default',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="record-info">
                        <?= $form->field($model, 'published_at')->widget(DatePicker::className(), ['options' => ['class' => 'form-control']]); ?>

                        <?= $form->field($model, 'status')->dropDownList(Post::getStatusList(), ['class' => '']) ?>

                        <?= $form->field($model, 'author_id')->dropDownList(User::getUsersList(), ['class' => '']) ?>

                        <?= $form->field($model, 'comment_status')->dropDownList(Post::getCommentStatusList(), ['class' => '']) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
