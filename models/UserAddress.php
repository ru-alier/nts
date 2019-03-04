<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_address".
 *
 * @property int $id
 * @property string $country
 * @property string $region
 * @property string $city
 * @property string $street
 * @property string $building
 * @property string $house_number
 * @property string $apartment
 * @property string $comment
 * @property int $user_id
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id','country', 'city','street','house_number'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'validateIsExistID'],
            [['country', 'city'], 'string', 'max' => 45],
            [['region', 'street'], 'string', 'max' => 255],
            [['building', 'house_number', 'apartment'], 'string', 'max' => 5],
            [['comment'], 'string', 'max' => 1000],
        ];
    }


    public function validateIsExistID($attr)
    {
        if (is_null(SprUsersSearch::findOne(['id'=>$this->user_id])))
        {
            $this->addError($attr, 'Пользователь с таким ID не существует, проверьте корректность введеного User ID');
            echo SprUsersSearch::findOne(['id'=>$this->user_id]);
        }
       else if ((count(UserAddressSearch::find()->where(['user_id'=>$this->user_id])->all())>=1)&& $this->id === null)
       {
           $this->addError($attr, 'Адрес у данного пользователя уже существуют, запрещено вводить больше одного адреса (отредактируйте существующий)');
       }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Страна',
            'region' => 'Регион',
            'city' => 'Город',
            'street' => 'Улица',
            'building' => 'Строение',
            'house_number' => 'Номер дома',
            'apartment' => 'Квартира(офис)',
            'comment' => 'Комментарий',
            'user_id' => 'User ID',
        ];
    }

    public function getSprUsers()
    {
        return $this->hasOne(SprUsers::className(),['id' => 'user_id']);
    }

    public function setTestAddress()
    {
        $faker = \Faker\Factory::create('Ru_RU');
        $this -> country = $faker -> country;
        $this -> region = $faker -> postcode;
        $this -> city = $faker -> city;
        $this -> street = $faker -> streetName;
        $this -> building = $faker -> buildingNumber;
        $this -> house_number = $faker -> buildingNumber;
        $this -> apartment = $faker -> numberBetween(1, 999);
        $this -> comment = $faker -> realText(100);
        $this -> user_id = (string)rand(1,400);
    }
}
