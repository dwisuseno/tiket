<?php
namespace app\models\base;
use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the base model class for table "review".
 * @property integer $id
 * @property integer $event_id
 * @property string $isi
 * @property string $created_at
 * @property string $updated_at
 * @property \app\models\Event $event
 */
class Review extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    public function rules()
    {
        return [
            [['event_id'], 'integer'],
            [['isi'], 'string'],
            [['created_at', 'updated_at'], 'string', 'max' => 50]
        ];
    }
    public static function tableName()
    {
        return 'review';
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'Event ID',
            'isi' => 'Isi',
        ];
    }
    public function getEvent()
    {
        return $this->hasOne(\app\models\Event::className(), ['id' => 'event_id']);
    }
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
    public static function find()
    {
        return new \app\models\ReviewQuery(get_called_class());
    }
}
