<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Groups;

/**
 * GroupsSearch represents the model behind the search form about `app\models\Groups`.
 */
class GroupsSearch extends Groups
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'places'], 'integer'],
            [['prof','name', 'class', 'date', 'level', 'first', 'last', 'homework'], 'safe'],
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
        $query = Groups::find();

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
            'name' => $this->name,
            'places' => $this->places,
            'first' => $this->first,
            'last' => $this->last,
        ]);

        $query->andFilterWhere(['like', 'prof', $this->prof])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'homework', $this->homework]);

        return $dataProvider;
    }


    public function getGroups($id, $params)
    {
        $query = Groups::find();
        $query->andFilterWhere(['prof' => $id]);


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
            'name' => $this->name,
            'places' => $this->places,
            'first' => $this->first,
            'last' => $this->last,
        ]);

        $query->andFilterWhere(['like', 'prof', $this->prof])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'homework', $this->homework]);

        return $dataProvider;
    }
}
