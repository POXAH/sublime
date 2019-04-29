<?php


namespace app\models;


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
        $products = Product::find()
            ->orderBy(['id'=>SORT_DESC])
            ->limit($count)
            ->asArray()
            ->all();
        return $products;
    }


    public function getOneProducts($link_name)
    {
        $product = Product::find()
            ->where(['link_name' => $link_name])
            ->one();
        return $product;
    }

//    public function getCategoryProducts($category)
//    {
//        $products = Product::find()
//            ->where(['id_category' => $category])
//            ->asArray()
//            ->all();
//        return $products;
//    }


    public function getCategoryProductsWithLimit($category, $count)
    {
        $products = Product::find()
            ->where(['id_category' => $category])
            ->limit($count)
            ->asArray()
            ->all();
        return $products;
    }

    public function getSearchResult($search)
    {
        $searchResult = Product::find()
            ->where(['like','name', $search])
            ->orWhere(['like', 'description', $search]);
//            ->asArray()
//            ->all();
        return $searchResult;
    }


}