<?php


namespace app\controllers;


use app\models\Product;
use Yii;
use yii\web\Controller;

class SearchController extends Controller
{

    public function actionIndex()
    {
        $search = htmlspecialchars(Yii::$app->request->get('search'));
        $product = new Product();
        $product = $product->getSearchResult($search);
        $total = $product['total'];
        $pages = $product['pages'];
        $products = $product['products'];
        return $this->render('index', compact('products', 'pages', 'total', 'search'));
    }
}