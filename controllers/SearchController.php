<?php


namespace app\controllers;


use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

class SearchController extends Controller
{

    public function actionIndex()
    {
        $search = htmlspecialchars(Yii::$app->request->get('search'));
        $product = new Product();
        $product = $product->getSearchResult($search);
//        $products = $product->asArray()->all();
        $total = $product->count();
        $pages = new Pagination(['totalCount' => $product->count(), 'pageSize' => 4]);
        $products = $product
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->all();
        return $this->render('index', compact('products', 'pages', 'total', 'search'));
    }
}