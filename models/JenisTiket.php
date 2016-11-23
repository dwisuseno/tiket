<?php

namespace app\models;

use \app\models\base\JenisTiket as BaseJenisTiket;

/**
 * This is the model class for table "jenis_tiket".
 */
class JenisTiket extends BaseJenisTiket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_tiket', 'harga'], 'integer'],
            [['kode_jenis'], 'string', 'max' => 10],
            [['nama', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
	
}
