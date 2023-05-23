<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "audio_category".
 *
 * @property int $audio_cate_id
 * @property string $group_id
 * @property string $audio_cate_name
 * @property int $status
 * @property string|null $created_at
 * @property string $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class AudioCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'audio_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'audio_cate_name', 'created_by'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['group_id', 'audio_cate_name'], 'string', 'max' => 255],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'audio_cate_id' => Yii::t('app', 'Audio Cate ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'audio_cate_name' => Yii::t('app', 'Audio Cate Name'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
    public function getAudio()
    {
        $audio = Audio::find()->where(['audio_cate_id' => $this->audio_cate_id, 'status' => 10])->all();

        return $audio;
    }




}
