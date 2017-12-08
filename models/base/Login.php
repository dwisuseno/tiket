<?php
namespace app\models\base;
use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the base model class for table "login".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string $role
 */
class Login extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    public function rules()
    {
        return [
            [['username'], 'string', 'max' => 30],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 50],
            [['role'], 'string', 'max' => 10]
        ];
    }
    public static function tableName()
    {
        return 'login';
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'role' => 'Role',
        ];
    }
    public static function find()
    {
        return new \app\models\LoginQuery(get_called_class());
    }
}
