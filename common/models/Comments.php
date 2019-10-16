<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $news
 * @property string $text
 *
 * @property Post $news0
 *
 **/

class Comments extends ActiveRecord
{
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

    public static function getComments($id)
    {
        $comments = Comments::find()  //вывод комментов
            ->where(['news' => $id])
            ->all();
        return $comments;
    }



}