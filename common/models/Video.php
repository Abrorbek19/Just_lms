<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $video_id
 * @property string $group_id
 * @property string $video_title
 * @property string $video_upload
 * @property int $status
 * @property string|null $created_at
 * @property string $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'video_title', 'video_upload', 'created_by'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['group_id', 'video_title', 'video_upload'], 'string', 'max' => 255],
            [['video_upload'], 'file', 'skipOnEmpty' => true, 'extensions' => ['mp4', 'mp3', 'mpeg4',],'maxSize' => 1024 * 1024 * 100, 'maxFiles' => 1],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'video_id' => Yii::t('app', 'Video ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'video_title' => Yii::t('app', 'Video Title'),
            'video_upload' => Yii::t('app', 'Video Upload'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

}
