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
            [['id_vid_type', 'user_id'], 'integer'],
            [['data'], 'string', 'max' => 30],
            [['comment'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_vid_type' => 'Id Vid Type',
            'data' => 'Data',
            'comment' => 'Comment',
            'user_id' => 'User ID',
        ];
    }
}
