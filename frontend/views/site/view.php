<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = $post->header;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="">
    <?php print $post->header ?><br><br>
    <?php print $post->img ?><br>
    <?php print $post->body ?><br><br><br>

    <?php Pjax::begin(['enablePushState' => false]); ?>
        Просмотры: <?php print $post->views ?><br><br>
        <?= Html::a('+', ['site/like'], ['class' => 'btn btn-sm btn-warning']) ?>
        Рейтинг: <?php print $post->rating ?>
        <?= Html::a('-', ['site/dislike'], ['class' => 'btn btn-sm btn-primary']) ?>
    <?php Pjax::end(); ?>


</div>
