<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VideoAudioFile;

/**
 * VideoAudioFileSearch represents the model behind the search form of `common\models\VideoAudioFile`.
 */
class VideoAudioFileSearch extends VideoAudioFile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_audio_file_id', 'status'], 'integer'],
            [['library_category', 'week_category','image','audio_title', 'audio_voice', 'video_title', 'video', 'file_title', 'file_upload', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
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
        $query = VideoAudioFile::find();

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
            'video_audio_file_id' => $this->video_audio_file_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'library_category', $this->library_category])
            ->andFilterWhere(['like', 'week_category', $this->week_category])
            ->andFilterWhere(['like', 'audio_title', $this->audio_title])
            ->andFilterWhere(['like', 'audio_voice', $this->audio_voice])
            ->andFilterWhere(['like', 'video_title', $this->video_title])
            ->andFilterWhere(['like', 'video', $this->video])
            ->andFilterWhere(['like', 'file_title', $this->file_title])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'file_upload', $this->file_upload])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
