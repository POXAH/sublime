<?php


namespace app\controllers;

use app\models\Mailer;
use yii\web\Controller;
use app\models\Cart;
use app\models\Product;
use Yii;


class ProductController extends Controller
{
    public function actionIndex($link_name)
    {
        $mailer = new Mailer();
        if ($mailer->load(Yii::$app->request->post())){
            if ($mailer->save()){
                $mailer->sendEmailSubscribe($mailer->email);
                return $this->render('/site/success', compact('mailer'));
            }
        }
        $objProducts = new Product();
        $product = $objProducts->getOneProducts($link_name);
        $products = $objProducts->getCategoryProductsWithLimit($product->id_category, 4);
        return $this->render('index', compact('products', 'product', 'mailer'));
    }

    public function actionAdd($link_name, $qty)
    {
        $objProducts = new Product();
        $product = $objProducts->getOneProducts($link_name);
        $products = $objProducts->getCategoryProductsWithLimit($product->id_category, 4);
        $session =Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        return $session['cart.totalQuantity'].', $'.$session['cart.totalSum'];
    }
}