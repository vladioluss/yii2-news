<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $post->header;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="">
    <?php print $post->header ?><br><br>
    <?php print $post->body ?><br><br><br>
    Просмотры: <?php print $post->views ?><br>
    Рейтинг: <?php print $post->rating ?>
</div>