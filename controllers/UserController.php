<?php


namespace app\controllers;


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
                $orders_id = new Order();
                $orders_id = $orders_id->getOrderByUser(Yii::$app->user->id);
                $orders_info =  new OrderInfo();
                $orders_info = $orders_info->getOrderInfo($orders_id);
                return $this->render('index', compact('orders_id','orders_info'));
            } else {
                return $this->goHome();
            }
        }

    }


}