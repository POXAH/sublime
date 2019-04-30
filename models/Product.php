<?php


namespace app\models;


use Yii;
use yii\data\Pagination;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }

    public function getAllProducts()
    {
        $products = Product::find()->asArray()->all();
        return $products;
    }

    public function getLastProducts($count)
    {
        $products = Yii::$app->cache->get('last_products');
        if (!$products){
            $products = Product::find()
                ->orderBy(['id'=>SORT_DESC])
                ->limit($count)
                ->asArray()
                ->all();
            Yii::$app->cache->set('last_products', $products, 10);
        }

        return $products;
    }


    public function getOneProducts($link_name)
    {
        $product = Yii::$app->cache->get('product_'.$link_name);
        if (!$product){
            $product = Product::find()
                ->where(['link_name' => $link_name])
                ->one();
            Yii::$app->cache->set('product_'.$link_name, $product, 60);
        }
        return $product;
    }


    public function getCategoryProductsWithLimit($category, $count)
    {
        $products = Yii::$app->cache->get('products_limit_'.$category);
        if (!$products){
            $products = Product::find()
                ->where(['id_category' => $category])
                ->limit($count)
                ->asArray()
                ->all();
            Yii::$app->cache->set('products_limit_'.$category, $products, 60);
        }
        return $products;
    }

    public function getPaginationProduct($id)
    {
        $query = Product::find()->where(['id_category' => $id]);
        $total = $query->count();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->all();
        $arrResult = ['total' => $total, 'pages' => $pages, 'products' => $products];
        return $arrResult;
    }

    public function getSearchResult($search)
    {
        $searchResult = Yii::$app->cache->get('search_'.$search);
        if (!$searchResult){
            $searchResult = Product::find()
                ->where(['like','name', $search])
                ->orWhere(['like', 'description', $search]);
            Yii::$app->cache->set('search_'.$search, $searchResult, 60);
        }
//            ->asArray()
//            ->all();
        return $searchResult;
    }


}