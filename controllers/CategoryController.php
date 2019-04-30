<?php


namespace app\controllers;


use app\models\Category;
use app\models\Mailer;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $mailer = new Mailer();
        if ($mailer->load(Yii::$app->request->post())){
            if ($mailer->save()){
                $mailer->sendEmailSubscribe($mailer->email);
                return $this->render('/site/success', compact('mailer'));
            }
        }
        $categories = Category::getCategories();
        return $this->render('index', compact('categories', 'mailer'));
    }

    public function actionView($id)
    {
        $mailer = new Mailer();
        if ($mailer->load(Yii::$app->request->post())){
            $mailer->auth_token = Yii::$app->security->generateRandomString();
            $mailer->date_create = date('Y-m-d H:i:s');;
            if ($mailer->save()){
                $mailer->sendEmailSubscribe($mailer->email);
                return $this->render('/site/success', compact('mailer'));
            }
        }

        $query = Product::find()->where(['id_category' => $id]);
        $total = $query->count();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->all();
        $category = new Category();
        $category = $category->getOneCategory($id);
        return $this->render('view', compact('products', 'category', 'mailer', 'pages', 'total'));
    }
}