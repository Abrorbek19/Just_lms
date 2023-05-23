<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video_audio_file".
 *
 * @property int $video_audio_file_id
 * @property string $library_category
 * @property string $week_category
 * @property string|null $audio_voice
 * @property string|null $audio_title
 * @property string|null $video
 * @property string|null $video_title
 * @property string|null $file_title
 * @property string|null $image
 * @property string|null $file_upload
 * @property int $status
 * @property string|null $created_at
 * @property string $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class VideoAudioFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video_audio_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['library_category', 'week_category', 'created_by'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['library_category', 'week_category','image', 'audio_title','video_title','file_title', 'audio_voice', 'video', 'file_upload'], 'string', 'max' => 255],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions'=>['jpg','png', 'jpeg'], 'maxFiles' => 1],
            [['video'], 'file', 'skipOnEmpty' => true, 'extensions' => ['mp4', 'mp3', 'mpeg4',], 'maxFiles' => 1, 'maxSize' => 1024 * 1024 * 100,],
            [['file_upload'], 'file', 'skipOnEmpty' => true, 'extensions'=>['pdf'], 'maxFiles' => 1],
            [['audio_voice'], 'file', 'skipOnEmpty' => true, 'extensions' => ['mp4', 'mp3', 'mpeg4',], 'maxFiles' => 1, 'maxSize' => 1024 * 1024 * 50,],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'video_audio_file_id' => Yii::t('app', 'Video Audio File ID'),
            'library_category' => Yii::t('app', 'Library Category'),
            'week_category' => Yii::t('app', 'Week Category'),
            'audio_title' => Yii::t('app', 'Audio Title'),
            'audio_voice' => Yii::t('app', 'Audio Voice'),
            'video_title' => Yii::t('app', 'Video Title'),
            'video' => Yii::t('app', 'Video'),
            'file_title' => Yii::t('app', 'File Title'),
            'image' => Yii::t('app', 'File Image'),
            'file_upload' => Yii::t('app', 'File Upload'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
