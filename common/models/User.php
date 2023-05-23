<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\base\NotSupportedException;
use yii\base\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property int $role
 * @property string $username
 * @property string $auth_key
 * @property string $password
 * @property string $email
 * @property int $status
 * @property string|null $created_at
 * @property string $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'role','auth_key', 'password','created_by'], 'required'],
            [['role', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
//            [['username', 'password', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['created_by', 'updated_by'], 'string', 'max' => 50],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'role' => Yii::t('app', 'Role'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
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

    public static function findIdentity($user_id)
    {
        // TODO: Implement findIdentity() method.
        return self::findOne($user_id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
        throw new NotSupportedException();
    }

    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->user_id;
    }
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
       return $this->auth_key ===$authKey;
    }
    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }
    public function validatePassword($password){
        return $this->password ===$password;
    }
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

}
