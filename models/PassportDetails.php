<?php

namespace app\models;

use Yii;

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
            [['passport_series', 'passport_number', 'user_id'], 'integer'],
            [['passport_when_issued'], 'safe'],
            [['passport_issued_by'], 'string', 'max' => 255],
            [['passport_division_number'], 'string', 'max' => 7],
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
            'passport_series' => 'Passport Series',
            'passport_number' => 'Passport Number',
            'passport_issued_by' => 'Passport Issued By',
            'passport_when_issued' => 'Passport When Issued',
            'passport_division_number' => 'Passport Division Number',
            'comment' => 'Comment',
            'user_id' => 'User ID',
        ];
    }
}
