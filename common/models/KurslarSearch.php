<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Kurslar;

/**
 * KurslarSearch represents the model behind the search form of `common\models\Kurslar`.
 */
class KurslarSearch extends Kurslar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'davomiylik', 'dars_vaqti', 'oylik_tolov', 'batafsil'], 'safe'],
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
        $query = Kurslar::find();

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
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'davomiylik', $this->davomiylik])
            ->andFilterWhere(['like', 'dars_vaqti', $this->dars_vaqti])
            ->andFilterWhere(['like', 'oylik_tolov', $this->oylik_tolov])
            ->andFilterWhere(['like', 'batafsil', $this->batafsil]);

        return $dataProvider;
    }
}
