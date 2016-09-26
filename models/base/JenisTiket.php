<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "jenis_tiket".
 *
 * @property integer $id
 * @property string $kode_jenis
 * @property string $nama
 * @property integer $harga
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Tiket[] $tikets
 */
class JenisTiket extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['harga'], 'integer'],
            [['kode_jenis'], 'string', 'max' => 10],
            [['nama', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_tiket';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_jenis' => 'Kode Jenis',
            'nama' => 'Nama',
            'harga' => 'Harga',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTikets()
    {
        return $this->hasMany(\app\models\Tiket::className(), ['jenis_id' => 'id']);
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
     * @return \app\models\JenisTiketQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\JenisTiketQuery(get_called_class());
    }
}
