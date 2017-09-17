<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "event".
 *
 * @property integer $id
 * @property string $nama_event
 * @property string $tgl_event
 * @property string $waktu_event
 * @property integer $jumlah_tiket
 * @property string $path_gambar
 * @property string harga_ps
 * @property string harga_ots
 * @property integer $count
 * @property integer $tiket_terjual
 * @property string $gambar1
 * @property string $gambar2
 * @property string $gambar3
 * @property string $gambar4
 * @property string $gambar5
 * @property string $gambar6
 * @property string $gambar7
 * @property string $gambar8
 * @property string $gambar9
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Tiket[] $tikets
 */
class Event extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    public $file;
    public $file_gambar1;
    public $file_gambar2;
    public $file_gambar3;
    public $file_gambar4;
    public $file_gambar5;
    public $file_gambar6;
    public $file_gambar7;
    public $file_gambar8;
    public $file_gambar9;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl_event', 'waktu_event'], 'safe'],
            [['jumlah_tiket', 'harga_ps', 'harga_ots', 'count', 'tiket_terjual'], 'integer'],
            [['deskripsi'], 'string'],
            [['file', 'file_gambar1', 'file_gambar2', 'file_gambar3', 'file_gambar4', 'file_gambar5', 'file_gambar6', 'file_gambar7', 'file_gambar8', 'file_gambar9'],'file'],
            [['nama_event', 'path_gambar', 'gambar1', 'gambar2', 'gambar3', 'gambar4', 'gambar5', 'gambar6', 'gambar7', 'gambar8', 'gambar9', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['alamat'], 'string', 'max' => 300]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_event' => 'Nama Event',
            'tgl_event' => 'Tgl Event',
            'waktu_event' => 'Waktu Event',
            'alamat' => 'Alamat', 
            'jumlah_tiket' => 'Jumlah Tiket',
            'path_gambar' => 'Path Gambar',
            'file' => 'Foto',
            'deskripsi' => 'Description',
            'count' => 'Viewed Detail',
            'tiket_terjual' => 'Sold',
            'harga_ps' => 'Harga Tiket Pre-Sale', 
            'harga_ots' => 'Harga Tiket On The Spot', 
            'gambar1' => 'Gambar1',
            'gambar2' => 'Gambar2',
            'gambar3' => 'Gambar3',
            'gambar4' => 'Gambar4',
            'gambar5' => 'Gambar5',
            'gambar6' => 'Gambar6',
            'gambar7' => 'Gambar7',
            'gambar8' => 'Gambar8',
            'gambar9' => 'Gambar9',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTikets()
    {
        return $this->hasMany(\app\models\Tiket::className(), ['event_id' => 'id']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\EventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\EventQuery(get_called_class());
    }
}
