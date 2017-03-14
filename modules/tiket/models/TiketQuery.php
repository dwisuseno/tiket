<?php

namespace app\modules\tiket\models;

/**
 * This is the ActiveQuery class for [[Tiket]].
 *
 * @see Tiket
 */
class TiketQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Tiket[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tiket|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}