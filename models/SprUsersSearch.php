<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SprUsers;

/**
 * SprUsersSearch represents the model behind the search form of `app\models\SprUsers`.
 */
class SprUsersSearch extends SprUsers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'status_id'], 'integer'],
            [[ 'login', 'password', 'name', 'last_name', 'descript', 'id'], 'safe'],
            [['date_reg'],'date', 'format' => 'php:Y-m-d H:i:s'],
            [['date_reg', 'status_id'], 'safe'],
        //    [['status_id'], 'integer'],
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
        $query = SprUsers::find();
//        $query->joinWith('userAddress');

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
            'date_reg' => $this->date_reg,
            'status_id' => $this->status_id,
        ]);

        $query
//            ->andFilterWhere(['like', 'city', $this->id])
            ->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'descript', $this->descript])
        ;

        return $dataProvider;
    }

    public function delDublicateLogin(){
        // $query = SprUsers::find()->select('id', 'login')->asArray()->all();
        //

    }
}
