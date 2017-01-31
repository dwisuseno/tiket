<?php

namespace app\models;

use \app\models\base\Review as BaseReview;

/**
 * This is the model class for table "review".
 */
class Review extends BaseReview
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['event_id'], 'integer'],
            [['isi'], 'string'],
            [['created_at', 'updated_at'], 'string', 'max' => 50]
        ]);
    }
	
}
