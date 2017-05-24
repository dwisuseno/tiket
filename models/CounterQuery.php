<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Counter]].
 *
 * @see Counter
 */
class CounterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Counter[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Counter|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}