<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "admin".
 *
 * @property int $admin_id
 * @property string $user_id
 * @property string $phone_number
 * @property int $user_role
 * @property int $status
 * @property string|null $created_at
 * @property string $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Admin extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'phone_number', 'user_role', 'created_by'], 'required'],
            [['user_role', 'status'], 'integer'],
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
            'admin_id' => Yii::t('app', 'Admin ID'),
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

    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getAdminId()
    {
        return $this->user_id;
        // TODO: Implement getId() method.
    }
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->admin_id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
    public static function findByid($admin_id){
        return self::findOne(['admin_id'=>$admin_id]);
    }
}
