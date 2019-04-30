<?php


namespace app\models;


use Yii;
use yii\db\ActiveRecord;

class Mailer extends ActiveRecord
{
    public static function tableName()
    {
        return 'mailing';
    }

    public function setEmail($auth_token)
    {
        $email = Mailer::find()
            ->where(['auth_token' => $auth_token])
            ->one();
        if ($email){
            $email->is_active = 1;
            $email->save();
            return 'OK';
        } else {
            return false;
        }
    }
    public function newEmail($email)
    {
        $this->email = $email;
        $this->auth_token = Yii::$app->security->generateRandomString();
        $this->save();
        return $this;
    }

    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'email'],
        ];
    }

    public function sendEmailSubscribe($email)
    {
        $mailer = $this->newEmail($email);
        Yii::$app->mailer->compose('subscribe-mail', ['post' => $mailer])
            ->setFrom(['admin@poxah.ru' => 'Administator'])
            ->setTo($mailer['email'])
            ->setSubject('Confirm subscription')
            ->send();
    }

    public function sendEmailOrder($order)
    {
        Yii::$app->mailer->compose('order-mail', ['post' => $order])
            ->setFrom(['admin@poxah.ru' => 'Administator'])
            ->setTo([$order['email'] => $order['name'].' '.$order['last_name']])
            ->setSubject('Ваш заказ принят')
            ->send();
    }

    public function sendEmailOrderAdmin($order)
    {
        Yii::$app->mailer->compose('admin_order-mail', ['post' => $order])
            ->setFrom(['admin@poxah.ru' => 'Administator'])
            ->setTo(['admin@poxah.ru' => 'Administator'])
            ->setSubject('Ваш заказ принят')
            ->send();
    }



}