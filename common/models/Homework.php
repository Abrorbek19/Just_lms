<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "homework".
 *
 * @property int $homework_id
 * @property string $group_id
 * @property string $homework_title
 * @property string $homework_date
 * @property int $status
 * @property string|null $created_at
 * @property string $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Homework extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'homework';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'homework_title', 'homework_date', 'created_by'], 'required'],
            [['homework_date', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['group_id', 'homework_title'], 'string', 'max' => 255],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'homework_id' => Yii::t('app', 'Homework ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'homework_title' => Yii::t('app', 'Homework Title'),
            'homework_date' => Yii::t('app', 'Homework Date'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

}
