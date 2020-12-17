<?php

namespace app\models;


use yii\base\Model;

class ResumeForm extends Model
{
    public $name;
    public $email;

    //реализуем валидацию формы
    public function rules()
    {
        //в массиве описываем поля которые должны валидироваться
        return [
            //эти поля Обязательны к заполнению => дописываем свойство required
            [['name', 'email'], 'required'],
            //дописываем свойство email для проверки корректности принятия данных
            ['email', 'email'],
        ];
    }
}