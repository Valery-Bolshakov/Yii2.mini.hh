<?php

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{
// создаем Главный контроллер от которого все остальные будут наследоваться. Он будет содержать в себе общую логику

// Пишем временное решение для title используя метод before action (метод который выполняется перед каждым action)
/*public function beforeAction($action)
{
    //берем свойство name которое мы задали в контейнере web и устанавливаем его как название сайта
    $this->view->title = \Yii::$app->name;
    return parent::beforeAction($action); // TODO: Change the autogenerated stub
}*/


}