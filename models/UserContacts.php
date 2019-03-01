<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_contacts".
 *
 * @property int $id
 * @property int $id_vid_type
 * @property string $data
 * @property string $comment
 * @property int $user_id
 */
class UserContacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_vid_type', 'data', 'user_id'], 'required'],
            [[ 'user_id'], 'integer'],
            [[ 'user_id'], 'validateIsExistID'],
            [['data'], 'string', 'max' => 30],
            [['comment'], 'string', 'max' => 500],
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
            'id_vid_type' => 'Вид связи',
            'data' => 'Данные',
            'comment' => 'Комментарий',
            'user_id' => 'User ID',
        ];
    }

    public function getSprContactType()
    {
        return $this->hasOne(SprContactType::className(),['id' => 'id_vid_type']);
    }

    public function getSprUsers()
    {
        return $this->hasOne(SprUsers::className(),['id' => 'user_id']);
    }

    public function setTestContact()
    {
        $faker = \Faker\Factory::create('Ru_RU');
        $id_vid = rand(1,6);
        $this -> id_vid_type = $id_vid;
        if ($id_vid < 5){
            $this -> data = $faker -> phoneNumber;
        } elseif ($id_vid == 5) {
            $this->data = $faker->email;
        } else $this -> data = $faker -> userName;
        $this -> comment = $faker -> realText(50);
        $this -> user_id = (string)rand(1,400);
    }

}
