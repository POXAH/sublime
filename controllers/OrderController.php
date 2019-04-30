<?php


namespace app\controllers;



use app\models\Mailer;
use app\models\Order;
use app\models\OrderInfo;
use app\models\RegistrationForm;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class OrderController extends Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();
        if ($order->load(Yii::$app->request->post())){
            $post = Yii::$app->request->post();
            if ($post['regular_checkbox_3']){
                $mailer = new Mailer();
                $mailer->sendEmailSubscribe($order->email);
            }
            if ($post['regular_checkbox_2']){
                $reg = new RegistrationForm();
                $idNewUser = $reg->registration($order);
                $order->id_user = $idNewUser;
            }
            $order->date = date('Y-m-d H:i:s');
            $order->sum = $session['cart.totalSum'];

            if (!Yii::$app->user->isGuest) $order->id_user = Yii::$app->user->id;
            $order->delivery_method = $session['cart.deliveryId'];
            if ($order->save()){

                $this->saveOrderInfo($session['cart'], $order->id);

                $mailer = new Mailer();
                $mailer->sendEmailOrder($order);
                $mailer->sendEmailOrderAdmin($order);

                $session->remove('cart');
                $session->remove('cart.totalQuantity');
                $session->remove('cart.totalSum');
                $session->remove('cart.deliveryPrice');
                $session->remove('cart.deliveryId');
                return $this->render('success',  [$type = 'order']);
            }
        }
        return $this->render('index', compact('order'));
    }

    protected function saveOrderInfo($products, $orderId)
    {
        foreach ($products as $id => $product){
            $orderInfo = new OrderInfo();
            $orderInfo->id_order = $orderId;
            $orderInfo->name = $product['name'];
            $orderInfo->quantity = $product['productQuantity'];
            $orderInfo->price = $product['price'];
            $orderInfo->sum = $product['price']*$product['productQuantity'];
            $orderInfo->product_id = $product['id'];
            $orderInfo->save();
        }
    }

//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::class,
//                'actions' => [
//                    'index' => ['post', 'get'],
//                ],
//            ],
//        ];
//    }

    public function actionSuccess($session)
    {
        return $this->render('success', compact('session'));
    }


}