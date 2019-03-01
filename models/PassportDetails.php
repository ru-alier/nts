<?php

namespace app\models;

use Yii;
use yii\db\conditions\ExistsCondition;

/**
 * This is the model class for table "passport_details".
 *
 * @property int $id
 * @property int $passport_series
 * @property int $passport_number
 * @property string $passport_issued_by
 * @property string $passport_when_issued
 * @property string $passport_division_number
 * @property string $comment
 * @property int $user_id
 */
class PassportDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'passport_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['passport_series', 'passport_number', 'passport_issued_by', 'passport_when_issued', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'validateIsExistID'],
            [['passport_when_issued', 'passport_series', 'passport_number'], 'safe'],
            [['passport_issued_by'], 'string', 'max' => 255],
            [['passport_division_number'], 'string', 'max' => 7],
            [['comment'], 'string', 'max' => 1000],
            [['passport_series', 'passport_number'],'string', 'max' => 6]
        ];
    }

    public function validateIsExistID($attr)
    {
        if (is_null(SprUsersSearch::findOne(['id'=>$this->user_id])))
        {
            $this->addError($attr, 'Пользователь с таким ID не существует, проверьте корректность введеного User ID');
            echo SprUsersSearch::findOne(['id'=>$this->user_id]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'passport_series' => 'Серия',
            'passport_number' => 'Номер',
            'passport_issued_by' => 'Кем выдан',
            'passport_when_issued' => 'Когда выдан',
            'passport_division_number' => 'Номер подразделения',
            'comment' => 'Комментарий',
            'user_id' => 'User ID',
        ];
    }

    public function setTestUserPassport()
    {
        $faker = \Faker\Factory::create('Ru_RU');
        $this -> passport_series = $faker -> unique()->randomNumber(4);
        $this -> passport_number = $faker -> unique()->numberBetween($min = 100000, $max = 999999);
        $this -> passport_issued_by = $faker -> company;
        $this -> passport_when_issued = $faker -> date();
        $this -> passport_division_number = (string)mt_rand(100,999).'-'.mt_rand(100,999);
        $this -> comment = $faker -> realText(50);
        $this -> user_id = (string)rand(1,400);

    }

    public function getSprUsers()
    {
        return $this->hasOne(SprUsers::className(),['id' => 'user_id']);
    }
}
