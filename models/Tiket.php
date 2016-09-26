<?php

namespace app\models;

use \app\models\base\Tiket as BaseTiket;

/**
 * This is the model class for table "tiket".
 */
class Tiket extends BaseTiket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['event_id', 'jenis_id','jumlah_tiket'], 'integer'],
            [['status'], 'string'],
            [['jumlah_tiket', 'jenis_id'], 'required'],
            [['kode_pembayaran', 'kode_tiket', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
	
}
