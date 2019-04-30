<?php


namespace app\controllers;


use app\models\Delivery;
use yii\web\Controller;
use Yii;
use app\models\Product;
use app\models\Cart;

class CartController extends Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
        $delivery = new Delivery();
        $delivery = $delivery->getAllMethodDelivery();
        return $this->render('index', compact('session', 'delivery'));
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('name');
        $session->remove('cart.totalQuantity');
        $session->remove('cart.totalSum');
        $session->remove('cart.deliveryPrice');
        $session->remove('cart.deliveryId');
        return $this->renderPartial('index', compact('session'));
    }

    public function actionUpdate($qty, $id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->updateCart($qty, $id);
        return $session['cart.totalQuantity'].', $'.$session['cart.totalSum'];
    }

    public function actionDelete($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalcCart($id);
        return $session['cart.totalQuantity'].', $'.$session['cart.totalSum'];

    }

    public function actionDelivery($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addDeliveryToCart($id);
        return $session['cart.totalQuantity'].', $'.$session['cart.totalSum'];

    }

}