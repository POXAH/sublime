<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\Mailer;
use app\models\Product;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Category;
class SiteController extends Controller
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
                    'logout' => ['post', 'get'],
                    'index' => ['post', 'get'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $products = new Product();
        $products = $products->getLastProducts(8);
        $category = Category::getCategories();
        $mailer = new Mailer();
        if ($mailer->load(Yii::$app->request->post())){
            if ($mailer->save()){
                $mailer->sendEmailSubscribe($mailer->email);
                return $this->render('success', compact('mailer'));
            }
        }

        return $this->render('index', compact('products', 'mailer', 'category'));
    }

    public function actionContact()
    {
        $contact = new ContactForm();
        if (Yii::$app->request->post()){
            $post = Yii::$app->request->post('ContactForm');
            Yii::$app->mailer->compose('contact-mail', ['post' => $post])
                ->setFrom(['admin@poxah.ru' => 'Administrator'])
                ->setTo(['crezi_23@mail.ru' => 'Administrator'])
                ->setSubject('New message in contacts')
                ->send();
            return $this->render('contact', compact('contact', 'post'));
        }
        return $this->render('contact', compact('contact'));
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
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

    public function actionSuccess()
    {
        return $this->render('success');
    }

    public function actionConfirmation($auth_token)
    {
        $mailing = new Mailer();
        if ($result = $mailing->setEmail($auth_token)){
            return $this->render('success', compact('result'));
        } else {
            $result = 'Error';
            return $this->render('success', compact('result'));
        }

    }

    public function actionRegistration($auth_token)
    {
        $mailing = new Mailer();
        if ($result = $mailing->setEmail($auth_token)){
            return $this->render('success', compact('result'));
        } else {
            $result = 'Error';
            return $this->render('success', compact('result'));
        }

    }
}
