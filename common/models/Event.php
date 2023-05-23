<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $event_id
 * @property string $event_name
 * @property string $event_description
 * @property string $event_date
 * @property int $status
 * @property string|null $created_at
 * @property string $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_name', 'event_description', 'event_date', 'created_by'], 'required'],
            [['event_date', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['event_name', 'event_description'], 'string', 'max' => 255],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_id' => Yii::t('app', 'Event ID'),
            'event_name' => Yii::t('app', 'Event Name'),
            'event_description' => Yii::t('app', 'Event Description'),
            'event_date' => Yii::t('app', 'Event Date'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
