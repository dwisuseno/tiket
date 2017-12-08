<?php
namespace app\models;
/**
 * This is the ActiveQuery class for [[Likert]].
 * @see Likert
 */
class LikertQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/
    public function all($db = null)
    {
        return parent::all($db);
    }
    public function one($db = null)
    {
        return parent::one($db);
    }
}

