<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $profile_id
 * @property string $full_name
 * @property string $description
 * @property string $image
 * @property string $address
 * @property string $email
 * @property string $date_of_birth
 * @property string $phone
 * @property string $status
 * @property string|null $created_at
 * @property string $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'description', 'image', 'address', 'email', 'date_of_birth', 'phone', 'status', 'created_by'], 'required'],
            [['created_at', 'updated_at','date_of_birth'], 'safe'],
            [['full_name', 'description',], 'string', 'max' => 500],
            [['image'], 'string', 'max' => 200],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions'=>'jpg,pdf,png, jpeg', 'maxFiles' => 1],
            [['address', 'email',], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 100],
            [['status'], 'integer'],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'profile_id' => Yii::t('app', 'Profile ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'address' => Yii::t('app', 'Address'),
            'email' => Yii::t('app', 'Email'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'phone' => Yii::t('app', 'Phone'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
