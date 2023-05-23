<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $books_id
 * @property string $group_id
 * @property string $books_name
 * @property string $books_image
 * @property string $books_upload
 * @property int $status
 * @property string|null $created_at
 * @property string $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'books_name', 'books_image', 'books_upload', 'created_by'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['books_image'], 'file', 'skipOnEmpty' => true, 'extensions'=>['jpg','png', 'jpeg'], 'maxFiles' => 1],
            [['books_upload'], 'file', 'skipOnEmpty' => true, 'extensions'=>['pdf'], 'maxFiles' => 1],
            [['group_id', 'books_name', 'books_image', 'books_upload'], 'string', 'max' => 255],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'books_id' => Yii::t('app', 'Books ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'books_name' => Yii::t('app', 'Books Name'),
            'books_image' => Yii::t('app', 'Books Image'),
            'books_upload' => Yii::t('app', 'Books Upload'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
