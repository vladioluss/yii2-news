<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $news
 * @property int $text
 *
 * @property Post $news0
 */
class Comments extends \yii\db\ActiveRecord
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
            [['news', 'text'], 'integer'],
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
            'news' => 'News',
            'text' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews0()
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
