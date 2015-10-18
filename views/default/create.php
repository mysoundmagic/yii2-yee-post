<?php

use yeesoft\post\PostModule;
use yeesoft\Yee;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = Yee::t('yee', 'Create') . ' ' . PostModule::t('post', 'Post');
$this->params['breadcrumbs'][] = ['label' => PostModule::t('post', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>
