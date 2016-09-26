<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[JenisTiket]].
 *
 * @see JenisTiket
 */
class JenisTiketQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return JenisTiket[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return JenisTiket|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}