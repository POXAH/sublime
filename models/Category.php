<?php


namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public static function getCategories()
    {
        $categories = Yii::$app->cache->get('categories');
        if (!$categories){
            $categories =Category::find()->asArray()->all();
            Yii::$app->cache->set('categories', $categories, 10);
        }
        return $categories;
    }
    public function getOneCategory($name)
    {
        $categories = Yii::$app->cache->get('categories-'.$name);
        if (!$categories){
            $categories =Category::find()->where(['name' => $name])->one();
            Yii::$app->cache->set('categories-'.$name, $categories, 30);
        }
        return $categories;
    }

    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
        ];
    }
}