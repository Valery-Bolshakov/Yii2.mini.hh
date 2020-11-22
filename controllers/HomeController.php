<?php

namespace app\controllers;


class HomeController extends AppController
{
// создали новый контроллер для работы с главной страницой приложения

    public function actionIndex()
    {
        //тайтл и метатеги можно задавайть как в экшенах так и в видах
        //$this->view->registerMetaTag(['name' => 'description', 'content' => 'мета-описание...'], 'description');
        //$this->view->title = 'Вписываем нужный нам тайтл';
        //методом render возвращаем Вид index, который создали в папке views->home
        return $this->render('index');
    }

    public function actionResumeView()
    {
        return $this->render('resume-view');
    }

    public function actionMyResume()
    {
        return $this->render('my-resume');
    }

    public function actionEditRegResume()
    {
        return $this->render('edit-reg-resume');
    }

}