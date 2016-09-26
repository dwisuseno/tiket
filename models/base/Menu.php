<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "menu".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property string $route
 * @property integer $order
 * @property resource $data
 *
 * @property \app\models\Menu $parent0
 * @property \app\models\Menu[] $menus
 */
class Menu extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent', 'order'], 'integer'],
            [['data'], 'string'],
            [['name'], 'string', 'max' => 128],
            [['route'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent' => 'Parent',
            'route' => 'Route',
            'order' => 'Order',
            'data' => 'Data',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(\app\models\Menu::className(), ['id' => 'parent']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(\app\models\Menu::className(), ['parent' => 'id']);
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
     * @return \app\models\MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\MenuQuery(get_called_class());
    }
}
