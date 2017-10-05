<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Students;

/**
 * StudentsSearch represents the model behind the search form about `app\models\Students`.
 */
class StudentsSearch extends Students
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'responsible_id', 'appointed_id', 'confirmed_id', 'group_id', 'payments', 'test_mark', 'last_date'], 'integer'],
            [['name', 'from', 'purpose', 'test_level', 'payment_type', 'comment'], 'safe'],
            [['deposit'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Students::find();

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
            'responsible_id' => $this->responsible_id,
            'appointed_id' => $this->appointed_id,
            'confirmed_id' => $this->confirmed_id,
            'group_id' => $this->group_id,
            'deposit' => $this->deposit,
            'payments' => $this->payments,
            'test_mark' => $this->test_mark,
            'last_date' => $this->last_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'from', $this->from])
            ->andFilterWhere(['like', 'purpose', $this->purpose])
            ->andFilterWhere(['like', 'test_level', $this->test_level])
            ->andFilterWhere(['like', 'payment_type', $this->payment_type])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }


    public function getStudents($id, $params)
    {
        $query = Students::find();
        $query->andFilterWhere(['group_id' => $id]);


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
            'responsible_id' => $this->responsible_id,
            'appointed_id' => $this->appointed_id,
            'confirmed_id' => $this->confirmed_id,
            'group_id' => $this->group_id,
            'deposit' => $this->deposit,
            'payments' => $this->payments,
            'test_mark' => $this->test_mark,
            'last_date' => $this->last_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'from', $this->from])
            ->andFilterWhere(['like', 'purpose', $this->purpose])
            ->andFilterWhere(['like', 'test_level', $this->test_level])
            ->andFilterWhere(['like', 'payment_type', $this->payment_type])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
