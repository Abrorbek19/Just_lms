<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Audio;

/**
 * AudioSearch represents the model behind the search form of `common\models\Audio`.
 */
class AudioSearch extends Audio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['audio_id', 'status'], 'integer'],
            [['group_id', 'audio_cate_id', 'audio_title', 'audio_voice', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
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
        $query = Audio::find();

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
            'audio_id' => $this->audio_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'group_id', $this->group_id])
            ->andFilterWhere(['like', 'audio_cate_id', $this->audio_cate_id])
            ->andFilterWhere(['like', 'audio_title', $this->audio_title])
            ->andFilterWhere(['like', 'audio_voice', $this->audio_voice])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
