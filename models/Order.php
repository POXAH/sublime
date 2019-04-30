<?php


namespace app\models;


use Yii;
use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }

    public function getOrderInfo()
    {
        return $this->hasMany( OrderInfo::class, ['id_order' => 'id']);
    }

    public function getDelivery()
    {
        return $this->hasOne( Delivery::class, ['delivery_method' => 'id']);
    }

    public function rules()
    {
        return [
            [['name', 'last_name', 'address', 'phone', 'email', 'sum'], 'required'],
            [['email'], 'email'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    public function getOrderByUser($userId)
    {
        $orders = Yii::$app->cache->get('orders_'.$userId);
        if (!$orders){
            $orders = Order::find()
                ->where(['id_user' => $userId])
                ->select(['id','delivery_method'])
                ->asArray()
                ->all();
            Yii::$app->cache->set('orders_'.$userId, $orders, 10);
        }

        foreach ($orders as $order){
            $order_id['id'][] = $order['id'];
            $order_id['delivery_id'][] = $order['delivery_method'];
        }
        return $order_id;
    }
}