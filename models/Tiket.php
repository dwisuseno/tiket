<?php
namespace app\models;
use \app\models\base\Tiket as BaseTiket;
/**
 * This is the model class for table "tiket".
 */
class Tiket extends BaseTiket
{
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['event_id', 'user_id', 'harga'], 'integer'],
            [['status'], 'string'],
            [['kode_pembayaran', 'kode_tiket', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
}

