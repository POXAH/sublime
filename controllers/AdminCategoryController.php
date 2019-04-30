<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class AdminCategoryController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        $this->layout = 'admin-layout';
        if (Yii::$app->user->isGuest) {
            $model = new LoginForm();
            return $this->render('/admin/login',[
                'model' => $model,
            ]);
        } else {
            $dataProvider = new ActiveDataProvider([
                'query' => Category::find(),
            ]);
            if (Yii::$app->user->identity['access'] == 'admin'){
                return $this->render('index', [
                    'dataProvider' => $dataProvider,
                ]);
            } else {
                return $this->goHome();
            }
        }
    }

    public function actionView($id)
    {
        $this->layout = 'admin-layout';

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $this->layout = 'admin-layout';

        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $this->layout = 'admin-layout';

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
