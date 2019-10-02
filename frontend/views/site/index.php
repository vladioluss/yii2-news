<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Post;

$this->title = 'My Yii Application';
?>


<div class="d-flex flex-wrap">
    <?php foreach ($varInView as $item): ?>
    <div class="post-preview">
        <a href="<?= Url::toRoute(['site/view', 'id'=>$post->id]); ?>">
            <h2 class="post-title">
                <?php print $item->header ?>
            </h2>
            <h3 class="post-subtitle">
                <?php print $item->body ?>
            </h3>
        </a>
        <p class="post-meta">
            Просмотры: <?php print $item->views ?><br>
            Рейтинг: <?php print $item->rating ?>
        </p>
    </div>
    <?php endforeach ?>
    <hr>
</div>
