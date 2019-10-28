<?php

/* @var $this yii\web\View */
/* @var $comments common\models\comments */
/* @var $post common\models\post */
/* @var $model frontend\models\CommentForm */
/* @var $form yii\widgets\ActiveForm */

use common\models\Comments;
use frontend\models\CommentForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = $post->header;
$this->params['breadcrumbs'][] = $this->title;
?>
<article>
    <div class="row">
        <div class="col-lg-12 ">
            <h2><?php print $post->header ?></h2>
            <p><?php print $post->body ?></p>


            Просмотры: <?php print $post->views ?>
            <div class="my-class">
                <?= Html::a('+', ['site/like', 'id'=>$post->id], ['class' => 'btn btn-sm btn-primary', 'id' => 'like']) ?>
                <div id="rating">Рейтинг: <?php print $post->rating ?></div>
                <?= Html::a('-', ['site/dislike', 'id'=>$post->id], ['class' => 'btn btn-sm btn-warning', 'id' => 'dislike']) ?>
            </div>

            <?php Pjax::begin([
                'id'                 => 'pjax2',
                'enablePushState'    => false,
                'linkSelector'       => '#pjax2 a',
            ]) ?>
                <?php $form = ActiveForm::begin([/*'options' => ['data' => ['pjax' => true]]*/ ]);?>
                    <?= $form->field($model, 'news')->hiddenInput(['value'=>$post->id])->label(''); ?>
                    <?= $form->field($model, 'text')->textarea(); ?>
                    <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-default', ['data-pjax' => 1]])?>
                <?php ActiveForm::end();?>

            <?php $dataProvider = new ActiveDataProvider([
                'query' => Comments::find()->where(['news'=>$post->id]),
                'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
                'pagination' => [
                    'pageSize' => 6,
                ],
            ]); ?>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => function ($comments) {
                    return $comments->text;
                }
            ]); ?>
            <?php Pjax::end() ?>
        </div>
    </div>
</article>

<?php
$script = <<<JS

/*$('#like').click(function() {  
    $.ajax({  
        url: "site/like",  
        cache: false,  
        //data: '',
        success: function(data) {  
            $("#rating").html(data);
        }
    });  
    return false;
}); */ 

$("#like").click(function (e) {
    // тут прерываем текущее действие
    e.preventDefault(e);
    $.ajax({
        url: "site/like",
        type: "GET",
        cache: false,
        data: $('like').serialize(),
        success: function (data) {
            $('#rating').html(data);
        }
    });
});


    $(document).on('submit', "#pjax2", function (event) {
        $.pjax.submit(event, '#pjax2', {
            "push":true,
            "replace":false,
            "timeout":1000,
            "scrollTo":false
        });
    });
JS;
?>