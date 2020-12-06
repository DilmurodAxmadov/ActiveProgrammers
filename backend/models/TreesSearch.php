<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Trees;

/**
 * TreesSearch represents the model behind the search form of `backend\models\Trees`.
 */
class TreesSearch extends Trees
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'girth', 'planted_at', 'main_photo_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at', 'genus_id'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'description_uz', 'description_ru', 'description_en', 'special_signs_uz', 'special_signs_ru', 'special_signs_en', 'latitude', 'longitude'], 'safe'],
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
        $query = Trees::find()->joinWith('mainPhoto');

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
            'girth' => $this->girth,
            'planted_at' => $this->planted_at,
            'main_photo_id' => $this->main_photo_id,
            'status' => $this->status,
            'genus_id' => $this->genus_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name_uz', $this->name_uz])
            ->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'description_uz', $this->description_uz])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'description_en', $this->description_en])
            ->andFilterWhere(['like', 'special_signs_uz', $this->special_signs_uz])
            ->andFilterWhere(['like', 'special_signs_ru', $this->special_signs_ru])
            ->andFilterWhere(['like', 'special_signs_en', $this->special_signs_en])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude]);

        return $dataProvider;
    }
}
