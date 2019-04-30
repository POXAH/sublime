<?php


namespace app\models;


use Yii;
use yii\db\ActiveRecord;

class Delivery extends ActiveRecord
{
    public static function tableName()
    {
        return 'delivery';
    }

    public function getAllMethodDelivery()
    {
        $method = Yii::$app->cache->get('all_delivery');
        if (!$method){
            $method = Delivery::find()->asArray()->all();
            Yii::$app->cache->set('all_delivery', $method, 10);
        }
        return $method;
    }

    public function getDelivery()
    {
        return $this->hasMany( Order::class, ['id' => 'delivery_method']);
    }
}