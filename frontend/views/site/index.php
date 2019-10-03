<?php

/* @var $this yii\web\View */

use yii\helpers\StringHelper;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>


<div class="d-flex flex-wrap">
    <?php foreach ($varInView as $post): ?>
    <div class="post-preview">
        <a href="<?= Url::toRoute(['site/view', 'id'=>$post->id]);?>">
            <h2 class="post-title">
                <?php print $post->header ?>
            </h2>
            <h3 class="post-subtitle">
                <?php print StringHelper::truncate($post->body,150,'...'); ?>
            </h3>
        </a>
        <p class="post-meta">

            Просмотры: <?php print $post->views ?><br>
            Рейтинг: <?php print $post->rating ?>
        </p>
    </div>
    <?php endforeach ?>
    <hr>
</div>
