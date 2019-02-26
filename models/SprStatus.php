<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spr_status".
 *
 * @property int $id
 * @property string $status_name
 */
class SprStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spr_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status_name'], 'required'],
            [['id'], 'integer'],
            [['status_name'], 'string', 'max' => 15],
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
            'status_name' => 'Status Name',
        ];
    }
}
