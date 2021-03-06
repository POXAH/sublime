<?php


namespace app\models;


use yii\db\ActiveRecord;
use Yii;

class RegistrationForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['username', 'password', 'name', 'phone', 'email'], 'required'],
            [['email'], 'email'],
            [['name', 'last_name', 'username', 'address'], 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::class,  'message' => 'Эта почта уже зарегистрирована'],
        ];
    }

    public function passwordHash($pass)
    {
        return Yii::$app->security->generatePasswordHash($pass);

    }

    public function registration($userInfo)
    {
        $check = RegistrationForm::find()
            ->where(['email'=>$userInfo['email']])
            ->one();
        if($check){
            return $check->id;
        } else {
            $this->name = $userInfo['name'];
            $this->last_name = $userInfo['last_name'];
            $this->address = $userInfo['address'];
            $this->phone = $userInfo['phone'];
            $this->email = $userInfo['email'];
            $this->username = $userInfo['name'].'_'.Yii::$app->security->generateRandomString(10);
            $pass = Yii::$app->security->generateRandomString(12);
            $this->password = $this->passwordHash($pass);
            $this->auth_token = Yii::$app->security->generateRandomString();
            if ($this->save()){
                $this->sendEmailRegistration($this->email, $this->auth_token, $pass, $this->username);
            }
            return $this->id;
        }

    }

    public function setEmail($auth_token)
{
    $email = RegistrationForm::find()
        ->where(['auth_token' => $auth_token])
        ->one();
    if ($email){
        $email->is_active = 1;
        $email->save();
        return true;
    } else {
        return false;
    }
}

    public function sendEmailRegistration($email, $token, $pass, $username)
    {
        Yii::$app->mailer->compose('registration-mail', ['post' => ['auth_token' => $token, 'pass' => $pass, 'login' => $username]])
            ->setFrom(['admin@poxah.ru' => 'Administator'])
            ->setTo($email)
            ->setSubject('Registration')
            ->send();
    }
}