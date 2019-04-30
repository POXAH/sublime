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
                ->select('id')
                ->asArray()
                ->all();
            Yii::$app->cache->set('orders_'.$userId, $orders, 10);
        }

        foreach ($orders as $order){
            $order_id[] = $order['id'];
        }
        return $order_id;
    }
}