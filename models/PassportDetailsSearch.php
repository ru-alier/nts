<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PassportDetails;

/**
 * PassportDetailsSearch represents the model behind the search form of `app\models\PassportDetails`.
 */
class PassportDetailsSearch extends PassportDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['passport_issued_by', 'passport_when_issued', 'passport_division_number', 'comment', 'passport_series', 'passport_number'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PassportDetails::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'passport_when_issued' => $this->passport_when_issued,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'passport_issued_by', $this->passport_issued_by])
            ->andFilterWhere(['like', 'passport_division_number', $this->passport_division_number])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like','passport_series', $this->passport_series])
            ->andFilterWhere(['like','passport_number', $this->passport_number]);

        return $dataProvider;
    }

    public static function findOnePassport($id)
    {
        return
//            PassportDetailsSearch::find()->where(['user_id'=>$id])->limit(1)->one();
        PassportDetailsSearch::findOne(['user_id'=>$id]);
    }
}
