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
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['country', 'city'], 'string', 'max' => 45],
            [['region', 'street'], 'string', 'max' => 255],
            [['building', 'house_number', 'apartment'], 'string', 'max' => 5],
            [['comment'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Country',
            'region' => 'Region',
            'city' => 'City',
            'street' => 'Street',
            'building' => 'Building',
            'house_number' => 'House Number',
            'apartment' => 'Apartment',
            'comment' => 'Comment',
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
