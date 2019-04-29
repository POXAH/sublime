<?php


namespace app\models;


use yii\base\Model;

class ContactForm extends Model
{
    public $name;
    public $subject;
    public $last_name;
    public $message;


    public function rules()
    {
        return [
            [['name', 'last_name', 'subject', 'message'], 'required'],
            [['name', 'last_name', 'subject'], 'string', 'max' => 255],
        ];
    }
}