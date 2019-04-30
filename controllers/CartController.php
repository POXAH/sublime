<?php


namespace app\controllers;


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
        return $this->render('index', compact('session'));
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('name');
        $session->remove('cart.totalQuantity');
        $session->remove('cart.totalSum');
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

}