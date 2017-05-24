<?php

namespace app\models;

use \app\models\base\Counter as BaseCounter;

/**
 * This is the model class for table "counter".
 */
class Counter extends BaseCounter
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['count_home'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
	
}
