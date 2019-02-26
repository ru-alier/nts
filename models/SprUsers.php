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
            [['login', 'password', 'name', 'last_name', 'date_reg', 'descript'], 'required'],
            [['date_reg'], 'safe'],
            [['status_id'], 'integer'],
            [['descript'], 'string'],
            [['login', 'password', 'name', 'last_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id auto incriment',
            'login' => 'Логин',
            'password' => 'Пароль',
            'name' => 'Имя',
            'last_name' => 'Фамилия',
            'date_reg' => 'Дата регистрации',
            'status_id' => 'Статус',
            'descript' => 'Комментарий',
        ];
    }
}
