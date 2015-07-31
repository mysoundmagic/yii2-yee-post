<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
?>

<div class="pull-<?= $position ?> col-lg-<?= $width ?> widget-height-<?= $height ?>">
    <div class="panel panel-default" style="position:relative; padding-bottom:15px;">
        <div class="panel-heading">Posts Activity</div>
        <div class="panel-body">

            <h4 style="font-style: italic;">Recently Published:</h4>

            <div class="clearfix">
                <?php foreach ($recentPosts as $post) : ?>
                    <div class="clearfix" style="border-bottom: 1px solid #eee; margin: 7px; padding: 0 0 5px 5px;">
                        <span style="font-size:80%; margin-right: 10px;"
                              class="label label-primary">[<?= $post->publishedDate ?>]</span>
                        <?= mb_substr($post->title, 0, 64, "UTF-8") ?>...<br/>
                    </div>
                <?php endforeach; ?>

            </div>

            <div style=" position: absolute; bottom:10px; left:0; right:0; text-align: center;"> |
                <?php foreach ($posts as $post) : ?>
                    <?= Html::a('<b>' . $post['count'] . '</b> ' . $post['label'], $post['url']); ?> &nbsp; | &nbsp;
                <?php endforeach; ?>
            </div>


        </div>
    </div>
</div>