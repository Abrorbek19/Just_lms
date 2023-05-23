<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "student".
 *
 * @property int $student_id
 * @property int $group_id
 * @property string $user_id
 * @property string $phone_number
 * @property int $user_role
 * @property int $status
 * @property string|null $created_at
 * @property string $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Student extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'group_id', 'phone_number', 'user_role', 'created_by'], 'required'],
            [['user_role','group_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id'], 'string', 'max' => 255],
            [['phone_number', 'created_by', 'updated_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_id' => Yii::t('app', 'Student ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'user_role' => Yii::t('app', 'User Role'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public function getGroup(){
        return $this->hasOne(Group::class,['group_id'=>'group_id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::class, ['user_id' => 'user_id']);
    }
    public function getGroup_Name(){
        return $this->group->group_name;
    }

    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getStudentId()
    {
        // TODO: Implement getId() method.
        return $this->user_id;
    }
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->student_id;
    }
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
    public static function findByid($student_id){
        return self::findOne(['student_id'=>$student_id]);
    }
}
