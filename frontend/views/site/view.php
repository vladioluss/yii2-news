<?php

/* @var $this yii\web\View */
/* @var $comments common\models\comments */
/* @var $form yii\widgets\ActiveForm */

use common\models\Comments;

use common\models\Post;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title = $post->header;
$this->params['breadcrumbs'][] = $this->title;

$comments = new Comments();
?>
<article>
    <div class="row">
        <div class="col-lg-12 ">
            <h2><?php print $post->header ?></h2>
            <p><?php print $post->body ?></p>

            <?php Pjax::begin([
                'id'                 => 'pjax1',
                'enablePushState'    => false,
                'linkSelector'       => '#pjax1 a',
            ]) ?>
            Просмотры: <?php print $post->views ?>
            <div class="my-class">
                <div>
                    <?= Html::a('+', ['site/like', 'id'=>$post->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    Рейтинг: <?php print $post->rating ?>
                    <?= Html::a('-', ['site/dislike', 'id'=>$post->id], ['class' => 'btn btn-sm btn-warning']) ?>
                </div>
            </div>
            <?php Pjax::end() ?>

            <?php /*Pjax::begin([
                'id'                 => 'pjax2',
                'enablePushState'    => false,
                'linkSelector'       => '#pjax2 a',
            ]) */?><!--
                <?php /*$form = ActiveForm::begin(['options' => ['data' => ['pjax' => true], 'action'=>'site/comm']]);*/?>
                    <?/*= $form->field($comments, 'text')->textarea(['rows'=>'5'])->label('Текст комментария'); */?>

                    <?/*//= Html::a('Оправить', ['site/comm', 'id'=>$post->id,], ['class' => 'btn btn-default']) */?>
                    <?/*= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-default', 'name' => 'sent']) */?>
                <?php /*ActiveForm::end();*/?>
            --><?php /*Pjax::end() */?>

            <?php $form = ActiveForm::begin(['id'=>'comment-form']); ?>
                <?= $form->field($comments, 'news')->hiddenInput(['value'=>$post->id])->label(''); ?>
                <?= $form->field($comments, 'text')->textarea(); ?>
                <?= Html::submitButton('Отправить', ['class'=>'btn btn-default']); ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</article>

