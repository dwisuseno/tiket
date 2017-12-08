<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tiket;
/**
 * app\models\TiketSearch represents the model behind the search form about `app\models\Tiket`.
 */
 class TiketSearch extends Tiket
{
    public function rules()
    {
        return [
            [['id', 'event_id', 'user_id', 'harga'], 'integer'],
            [['kode_pembayaran', 'kode_tiket', 'status', 'created_at', 'updated_at'], 'safe'],
        ];
    }
    public function scenarios()
    {
        return Model::scenarios();
    }
    public function search($params)
    {
        $query = Tiket::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'event_id' => $this->event_id,
            'user_id' => $this->user_id,
            'harga' => $this->harga,
        ]);
        $query->andFilterWhere(['like', 'kode_pembayaran', $this->kode_pembayaran])
            ->andFilterWhere(['like', 'kode_tiket', $this->kode_tiket])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);
        return $dataProvider;
    }
}
