<?php


namespace app\controllers;


use app\models\Delivery;
use app\models\LoginForm;
use app\models\Order;
use app\models\OrderInfo;
use Yii;
use yii\web\Controller;

class UserController extends Controller
{

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $model = new LoginForm();
            return $this->render('login',[
                'model' => $model,
            ]);
        } else {
            if (Yii::$app->user->identity['access'] == 'user'){
                $orders= new Order();
                $orders_id = $orders->getOrderByUser(Yii::$app->user->id);
                $orders_info =  new OrderInfo();
                $orders_info = $orders_info->getOrderInfo($orders_id['id']);
                $delivery = new Delivery();
                $delivery = $delivery->getAllMethodDelivery();
                return $this->render('index', compact('orders_id','orders_info', 'delivery'));
            } else {
                return $this->goHome();
            }
        }

    }


}