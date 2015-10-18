<?php

use yeesoft\post\PostModule;
use yeesoft\Yee;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = Yee::t('yee', 'Update') . ' ' . PostModule::t('post', 'Post') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => PostModule::t('post', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yee::t('yee', 'Update');
?>

<div class="post-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>


