<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "auth_item_child".
 *
 * @property string $parent
 * @property string $child
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\AuthItem $parent0
 * @property \app\models\AuthItem $child0
 */
class AuthItemChild extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'string', 'max' => 64],
            [['created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item_child';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => 'Parent',
            'child' => 'Child',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(\app\models\AuthItem::className(), ['name' => 'parent']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild0()
    {
        return $this->hasOne(\app\models\AuthItem::className(), ['name' => 'child']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
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

    /**
     * @inheritdoc
     * @return \app\models\AuthItemChildQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AuthItemChildQuery(get_called_class());
    }
}
