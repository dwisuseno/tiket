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
            [['jumlah_tiket', 'harga_ps', 'harga_ots', 'count', 'tiket_terjual'], 'integer'],
            [['deskripsi'], 'string'],
            [['file', 'file_gambar1', 'file_gambar2', 'file_gambar3', 'file_gambar4', 'file_gambar5', 'file_gambar6', 'file_gambar7', 'file_gambar8', 'file_gambar9'],'file'],
            [['nama_event', 'path_gambar', 'gambar1', 'gambar2', 'gambar3', 'gambar4', 'gambar5', 'gambar6', 'gambar7', 'gambar8', 'gambar9', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['alamat'], 'string', 'max' => 300]
        ]);
    }
	
}
