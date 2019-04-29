<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    public static function tableName()
    {
        return 'users';
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
//        foreach (self::$users as $user) {
//            if ($user['accessToken'] === $token) {
//                return new static($user);
//            }
//        }
//
//        return null;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username'=>$username]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_token;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_token === $authKey;
    }

    public function generateAuthKey()
    {
        $this->auth_token=Yii::$app->security->generateRandomString();
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
