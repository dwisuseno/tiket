<?php

namespace app\models;

use \app\models\base\Event as BaseEvent;

/**
 * This is the model class for table "event".
 */
class Event extends BaseEvent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['tgl_event', 'waktu_event'], 'safe'],
            [['jumlah_tiket', 'count', 'tiket_terjual'], 'integer'],
            [['deskripsi'], 'string'],
            [['file'],'file'],
            [['nama_event', 'path_gambar', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['alamat'], 'string', 'max' => 300]
        ]);
    }
	
}
