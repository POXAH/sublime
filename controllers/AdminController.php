<?php

namespace app\controllers;

use app\models\LoginForm;
use Yii;
use app\models\Order;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class AdminController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
        $model = new LoginForm();



        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $dataProvider = new ActiveDataProvider([
                'query' => Order::find()
            ]);
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }
        if (!Yii::$app->user->isGuest){
            if (Yii::$app->user->identity['access'] != 'admin') {
                return $this->goHome();
            } else {
                $dataProvider = new ActiveDataProvider([
                    'query' => Order::find()
                ]);
                return $this->render('index', [
                    'dataProvider' => $dataProvider,
                ]);
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
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

        $model = new Order();

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
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLogin()
    {
        $this->layout = 'admin-layout';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $dataProvider = new ActiveDataProvider([
                'query' => Order::find()
            ]);
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
