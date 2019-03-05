<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spr_users".
 *
 * @property int $id id auto incriment
 * @property string $login Логин
 * @property string $password Пароль
 * @property string $name Имя
 * @property string $last_name Фамилия
 * @property string $date_reg Дата регистрации
 * @property int $status_id Статус
 * @property string $descript Комментарий
 */
class SprUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spr_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'name', 'last_name', 'date_reg'], 'required'],
            [['login'], 'unique'],
            [['date_reg'], 'date', 'format' => 'php:Y-m-d H:i:s'],
            [['status_id'], 'safe'],
            [['login','name','last_name','descript'], 'trim'],
            [['descript'], 'string'],
            [['login', 'password', 'name', 'last_name'], 'string', 'max' => 50],
            [['password'], 'string', 'min' => 4]
        
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'name' => 'Имя',
            'last_name' => 'Фамилия',
            'date_reg' => 'Дата регистрации',
            'status_id' => 'Статус',
            'descript' => 'Комментарий',
        ];
    }

    public function getUserContacts()
    {
        return $this->hasMany(UserContacts::className(), ['user_id' => 'id']);
    }

    public function getUserAddress()
    {
        return $this->hasOne(UserAddress::className(), ['user_id' => 'id']);
    }

    public function getPassportDetail()
    {
        return $this->hasOne(PassportDetails::className(), ['user_id' => 'id']);
    }

    public function getSprStatus()
    {
        return $this->hasOne(SprStatus::className(), ['id' => 'status_id']);
    }

    public function setTestUser()
    {
        $faker = \Faker\Factory::create('Ru_RU');
        $this -> login = $faker -> userName;
        $this -> name = $faker -> firstName;
        $this -> last_name = $faker -> lastName;
        $this -> setPassword($faker -> password);
        $this -> date_reg = $faker -> date();
        $this -> descript = $faker -> text(100);
    }

    public function setPassword($password)
    {
        $this -> password =
            Yii::$app ->  security
                -> generatePasswordHash($password, 12);
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            UserContacts::deleteAll(['user_id' => $this->id]);
            UserAddress::deleteAll(['user_id' => $this->id]);
            PassportDetails::deleteAll(['user_id' => $this->id]);
                return true;
        } else return false;
    }
}
