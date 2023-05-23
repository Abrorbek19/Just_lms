<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Student;
use yii\data\Sort;

/**
 * StudentSearch represents the model behind the search form of `common\models\Student`.
 */
class StudentSearch extends Student
{
    public $group_name;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id','group_id', 'user_role', 'status'], 'integer'],
            [['user_id', 'phone_number', 'group_name', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
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
    public function search($params,$pageSize = 10)
    {
        $query = Student::find();

        // add conditions that should always apply here
        $query->joinWith(['group']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize,  // no pagination if it is 0
            ],
        ]);

        $dataProvider->sort->attributes['group_name'] =[
            'asc'=>['group_name' => SORT_ASC],
            'desc'=>['group_name'=>SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'student_id' => $this->student_id,
            'group_id' => $this->group_id,
            'user_role' => $this->user_role,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
//        $query->andWhere(['in', 'status', [10,2,3]]);
        $query->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'group_id', $this->group_id])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'group_name', $this->group_name])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
