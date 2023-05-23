<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $group_id
 * @property string $group_name
 * @property string $lesson_days
 * @property string $lesson_time
 * @property string $teacher_id
 * @property int $status
 * @property string|null $created_at
 * @property string $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_days', 'lesson_time', 'teacher_id', 'created_by'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['lesson_days', 'lesson_time', 'teacher_id'], 'string', 'max' => 255],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
            ['group_name','trim'],
            ['group_name', 'required'],
            ['group_name','unique', 'targetClass' => '\common\models\Group', 'message' => 'This Group Name has already been taken.'],
            ['group_name','string', 'min' => 2, 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'group_id' => Yii::t('app', 'Group ID'),
            'group_name' => Yii::t('app', 'Group Name'),
            'lesson_days' => Yii::t('app', 'Lesson Days'),
            'lesson_time' => Yii::t('app', 'Lesson Time'),
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
    public function getHomeworks()
    {
        return $this->hasMany(Homework::class, ['group_id' => 'group_id']);
    }


}
