<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class Comments extends ActiveRecord
{
    public $news;
    public $text;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news'], 'integer'],
            [['text'], 'string'],
            [['news'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['news' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news' => 'Запись',
            'text' => 'Текст',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(Post::className(), ['id' => 'news']);
    }

    /**
     * {@inheritdoc}
     * @return CommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentsQuery(get_called_class());
    }
}