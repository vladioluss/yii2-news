<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $header
 * @property string $body
 * @property string $img
 * @property int $views
 * @property int $rating
 *
 * @property Comments[] $comments
 */
class Post extends ActiveRecord
{

    /**
     * @var UploadedFile
     */
    //public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['header', 'body'], 'required'],
            [['body', 'img'], 'string'],
            [['views', 'rating'], 'integer'],
            [['header'], 'string', 'max' => 20],
            //[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'], //image file
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'header' => 'Заголовок',
            'body' => 'Текст',
            //'img' => 'Изображение',
            'views' => 'Просмотры',
            'rating' => 'Рейтинг',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['news' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentsQuery(get_called_class());
    }

    //Выводит все статьи.
    public static function getAll()
    {
        $post = Post::find()->all();
        return $post;
    }

    //загрузка изображения.
    /*public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('@frontend/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }*/

}
