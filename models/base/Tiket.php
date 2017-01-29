<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "tiket".
 *
 * @property integer $id
 * @property integer $event_id
 * @property integer $user_id
 * @property string $kode_pembayaran
 * @property string $kode_tiket
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\JenisTiket[] $jenisTikets
 * @property \app\models\Event $event
 */
class Tiket extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id', 'user_id'], 'integer'],
            [['status'], 'string'],
            [['kode_pembayaran', 'kode_tiket', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tiket';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'Event ID',
            'user_id' => 'User ID',
            'kode_pembayaran' => 'Kode Pembayaran',
            'kode_tiket' => 'Kode Tiket',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisTikets()
    {
        return $this->hasMany(\app\models\JenisTiket::className(), ['id_tiket' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(\app\models\Event::className(), ['id' => 'event_id']);
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
     * @return \app\models\TiketQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TiketQuery(get_called_class());
    }
}
