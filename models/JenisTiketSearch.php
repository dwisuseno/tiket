<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JenisTiket;

/**
 * app\models\JenisTiketSearch represents the model behind the search form about `app\models\JenisTiket`.
 */
 class JenisTiketSearch extends JenisTiket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'harga'], 'integer'],
            [['kode_jenis', 'nama', 'created_at', 'updated_at'], 'safe'],
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
        $query = JenisTiket::find();

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
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'kode_jenis', $this->kode_jenis])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
