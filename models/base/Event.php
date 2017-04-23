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
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Tiket[] $tikets
 */
class Event extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    public $file;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl_event', 'waktu_event'], 'safe'],
            [['jumlah_tiket', 'count'], 'integer'],
            [['deskripsi'], 'string'],
            [['file'],'file'],
            [['nama_event', 'path_gambar', 'created_at', 'updated_at'], 'string', 'max' => 255],
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
            'count' => 'Viewed',
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
