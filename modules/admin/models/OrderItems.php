<?php

namespace app\modules\admin\models;

use Yii;

class OrderItems extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'order_items';
    }

    public function getOrder(){
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    public function rules()
    {
        return [
            [['order_id', 'product_id', 'name', 'price', 'qty_item', 'sum_item'], 'required'],
            [['order_id', 'product_id', 'qty_item'], 'integer'],
            [['price', 'sum_item'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'name' => 'Name',
            'price' => 'Price',
            'qty_item' => 'Qty Item',
            'sum_item' => 'Sum Item',
        ];
    }
}
