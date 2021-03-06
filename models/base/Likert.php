<?php
namespace app\models\base;
use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the base model class for table "likert".
 *
 * @property integer $id
 * @property integer $kelas_a
 * @property integer $kelas
 * @property integer $kelas_c
 * @property integer $kelas_d
 * @property integer $kelas_e
 * @property integer $total
 */
class Likert extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    public function rules()
    {
        return [
            [['kelas_a', 'kelas_b', 'kelas_c', 'kelas_d', 'kelas_e', 'total'], 'integer'],
            [['hasil'], 'double']
        ];
    }
    public static function tableName()
    {
        return 'likert';
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kelas_a' => 'Kelas A',
            'kelas_b' => 'Kelas B',
            'kelas_c' => 'Kelas C',
            'kelas_d' => 'Kelas D',
            'kelas_e' => 'Kelas E',
            'total' => 'Total Pengunjung',
            'hasil' => 'Hasil (%)',
        ];
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
        return new \app\models\LikertQuery(get_called_class());
    }
}
