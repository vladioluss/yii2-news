<?php
/**
 * Created by PhpStorm.
 * User: grish
 * Date: 14.10.2019
 * Time: 16:40
 */

namespace frontend\models;

use common\models\Comments;
use const true;
use Yii;
use yii\base\Model;

class CommentForm extends Model
{
    public $news;
    public $text;

    public function rules()
    {
        return [
            [['news'], 'integer'],
            [['text'], 'string'],
            [['text', 'news'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'text' => 'Текст комментария',
        ];
    }

    //сохранение из формы в бд
    public function save() {
        $model = new Comments();
        $model->news = $this->news;
        $model->text = $this->text;

        return $model->save();
    }

}