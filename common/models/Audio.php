<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "audio".
 *
 * @property int $audio_id
 * @property string $group_id
 * @property string $audio_cate_id
 * @property string $audio_title
 * @property string $audio_voice
 * @property int $status
 * @property string|null $created_at
 * @property string $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Audio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */


    public static function tableName()
    {

        return 'audio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'audio_cate_id', 'audio_title', 'audio_voice', 'created_by'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['audio_voice'], 'file', 'skipOnEmpty' => true, 'extensions' => ['mp4', 'mp3',], 'maxFiles' => 1, 'maxSize' => 1024 * 1024 * 100,],
            [['group_id', 'audio_cate_id', 'audio_title', 'audio_voice'], 'string', 'max' => 255],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'audio_id' => Yii::t('app', 'Audio ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'audio_cate_id' => Yii::t('app', 'Audio Cate ID'),
            'audio_title' => Yii::t('app', 'Audio Title'),
            'audio_voice' => Yii::t('app', 'Audio Voice'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }


}
