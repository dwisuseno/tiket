<?php
namespace app\models;
use \app\models\base\Likert as BaseLikert;
/**
 * This is the model class for table "likert".
 */
class Likert extends BaseLikert
{
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['kelas_a', 'kelas_b', 'kelas_c', 'kelas_d', 'kelas_e', 'total'], 'integer'],
            [['hasil'], 'double']
        ]);
    }
}

