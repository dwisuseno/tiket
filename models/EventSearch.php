<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Event;

/**
 * app\models\EventSearch represents the model behind the search form about `app\models\Event`.
 */
 class EventSearch extends Event
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jumlah_tiket', 'count', 'tiket_terjual'], 'integer'],
            [['nama_event', 'alamat','deskripsi', 'tgl_event', 'waktu_event', 'created_at', 'updated_at'], 'safe'],
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
        $query = Event::find();

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
            'tgl_event' => $this->tgl_event,
            'alamat' => $this->alamat,
            'waktu_event' => $this->waktu_event,
            'jumlah_tiket' => $this->jumlah_tiket,
        ]);

        $query->andFilterWhere(['like', 'nama_event', $this->nama_event])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
