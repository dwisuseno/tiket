<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Likert;

/**
 * app\modules\tiket\models\LikertSearch represents the model behind the search form about `app\modules\tiket\models\Likert`.
 */
 class LikertSearch extends Likert
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kelas_a', 'kelas_b', 'kelas_c', 'kelas_d', 'kelas_e', 'total'], 'integer'],
            [['hasil'], 'double']
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
        $query = Likert::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'kelas_a' => $this->kelas_a,
            'kelas_b' => $this->kelas_b,
            'kelas_c' => $this->kelas_c,
            'kelas_d' => $this->kelas_d,
            'kelas_e' => $this->kelas_e,
            'total' => $this->total,
            'hasil' => $this->hasil
        ]);

        return $dataProvider;
    }
}
