<?php

namespace app\modules\tiket\models;

use \app\modules\tiket\models\base\Tiket as BaseTiket;

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
            [['event_id', 'user_id'], 'integer'],
            [['status'], 'string'],
            [['kode_pembayaran', 'kode_tiket', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
	
}
