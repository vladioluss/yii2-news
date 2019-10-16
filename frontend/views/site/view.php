<?php

/* @var $this yii\web\View */
/* @var $comments common\models\comments */
/* @var $post common\models\post */
/* @var $model frontend\models\CommentForm */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title = $post->header;
$this->params['breadcrumbs'][] = $this->title;
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

            <?php Pjax::begin([
                'id'                 => 'pjax2',
                'enablePushState'    => false,
                'linkSelector'       => '#pjax2 a',
            ]) ?>
                <?php $form = ActiveForm::begin(['options' => ['data' => ['pjax' => true]]]);?>
                    <?= $form->field($model, 'news')->hiddenInput(['value'=>$post->id])->label(''); ?>
                    <?= $form->field($model, 'text')->textarea(); ?>
                    <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-default'])?>
                <?php ActiveForm::end();?>

                <?php foreach ($comments as $comment): ?>
                    <?= $comment->text?><br>
                <?php endforeach ?>

            <?php Pjax::end() ?>

        </div>
    </div>
</article>

