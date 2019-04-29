<?php


namespace app\models;


use yii\db\ActiveRecord;

class OrderInfo extends ActiveRecord
{
    public static function tableName()
    {
        return 'order_info';
    }

    public function getOrder()
    {
        return $this->hasOne( Order::class, ['id' => 'id_order']);
    }

    public function getOrderInfo($id)
    {
        $orders = OrderInfo::find()->where(['id_order' => $id])->asArray()->all();
        return $orders;
    }
}