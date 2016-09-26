<?php

namespace app\models;

use \app\models\base\Login as BaseLogin;

/**
 * This is the model class for table "login".
 */
class Login extends BaseLogin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['username'], 'string', 'max' => 30],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 50],
            [['role'], 'string', 'max' => 10]
        ]);
    }
	
}
