<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "week".
 *
 * @property int $week_id
 * @property string $library_category
 * @property string $week_category
 * @property int $status
 * @property string|null $created_at
 * @property string $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Week extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'week';
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
            [['library_category', 'week_category'], 'string', 'max' => 255],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'week_id' => Yii::t('app', 'Week ID'),
            'library_category' => Yii::t('app', 'Library Category'),
            'week_category' => Yii::t('app', 'Week Category'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
