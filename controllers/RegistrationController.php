<?php


namespace app\controllers;


use app\models\RegistrationForm;
use yii\web\Controller;
use Yii;

class RegistrationController extends Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
        $reg = new RegistrationForm();
        if ($reg->load(Yii::$app->request->post())){
            $pass = $reg->password;
            $reg->password = $reg->passwordHash($pass);
            $reg->auth_token = Yii::$app->security->generateRandomString();
            if ($reg->save()){
                $reg->sendEmailRegistration($reg->email, $reg->auth_token, $pass, $reg->username);
                return $this->render('success', compact('reg'));
            }
        }
        return $this->render('index', compact('reg'));
    }

    public function actionConfirm($auth_token)
    {
        $confirm = new RegistrationForm();
        if ($confirm->setEmail($auth_token)){
            return $this->render('success');
        }
    }
}