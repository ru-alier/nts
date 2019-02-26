<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spr_vid_type".
 *
 * @property int $id
 * @property string $type
 */
class SprContactType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spr_vid_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['type'], 'string', 'max' => 30],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    public function getUserContacts()
    {
        return $this->hasMany(UserContacts::className(),['id_vid_type' => 'id']);
    }
}
