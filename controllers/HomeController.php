<?php

namespace app\controllers;


use app\models\Country;
use app\models\FilterForm;
use app\models\ResumeForm;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class HomeController extends AppController
{
// создали новый контроллер для работы с главной страницой приложения

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionForm()
    {
        //тайтл и метатеги можно задавайть как в экшенах так и в видах
        //$this->view->registerMetaTag(['name' => 'description', 'content' => 'мета-описание...'], 'description');
        //$this->view->title = 'Вписываем нужный нам тайтл';

        // создаем обьект модели для формы где будет находиться фильтр
        // передаем обьект модели в вид index посредством compact('model')
        $model = new FilterForm();

        //Приём данных из формы и их валидация:
        // Данный метод позволяет загрузить данные из формы в свойства модели
        // и валидирует принятые данные на основе правил валидации, описанных в модели
        /*if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            \Yii::$app->session->setFlash('success', 'данные приняты стандартно');
            return $this->refresh(); // перезапрашиваем страницу
            */
        //debug($model);
        // Проверяем пришли ли данные Pjax запросом:
        /*            if (\Yii::$app->request->isPjax) {
                        //Если данные отправлены и отвалидированы - Выведем сообщение об этом:
                        //вывод этого флэшСообщения делают либо в шаблоне либо в виде, обычно в шаблоне
                        \Yii::$app->session->setFlash('success', 'данные приняты через Pjax');
                        // Если Pjax запрос норм отработал то просто возвращаем чистую форму:
                        $model = new FilterForm();
                    } else {
                        \Yii::$app->session->setFlash('success', 'данные приняты стандартно');
                        //Если данные загружены и отвалидированы то метод refresh просто перенаправит нас на эту же страницу
                        return $this->refresh();
                    }*/
        //}

        //введем Ajax валидацию:
        //загружаем данные в модель и что бы запрос шёл методом post
        $model->load(\Yii::$app->request->post());
        // проверяем если пришли данные Ajax запросом то выставляем формат ответа json
        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->validate()) {
                return ['massage' => 'ok'];
            } else {
                return ActiveForm::validate($model);
            }
            // Возвращаем массив валидированых данных(пока что закоментим эту часть)
            //return ActiveForm::validate($model);
        } // далее условие можно продолжить проверками других свособов прихода и валидации данных

        //методом render возвращаем Вид index, который создали в папке views->home
        return $this->render('form', compact('model'));
    }


    /** Рассмотрим работу с ЧТЕНИЕМ записей из таблицы */
    public function actionView()
    {
        //$this->layout = 'main'; //можно указать какой шаблон использовать
        $this->view->title = 'Работа с моделями';
        // создаем новй экземпляр нашей модели
        //$model = new Country();

        /**получим все данные из таблицы:*/
        //Создать новый объект запроса вызовом метода yii\db\ActiveRecord::find();
        //Вызвать один из методов получения данных для извлечения данных в виде объектов Active Record.(all)
        //$countries = Country::find()->all();

        //Добавим операторы, что бы выводить не все данные а только необходимые (where)
        /*$countries = Country::find()->where("population < 100000000 AND code <> 'AU'")->all();*/

        //Добавим привязку значений, что бы данные от пользователя приходили корректно(с некоторой проверкой)
        /**Есть 3 способа как это сделать(для метода where)*/

        /**строковый формат, Например, 'status=1' */
        //проставим маркеры :population :code и вторым параметром в виде массива укажем их возможные значения:
        /*$countries = Country::find()->where("population < :population AND code <> :code",
            [':code' => 'AU', ':population' => 100000000])->all();*/ //безопасный sql запрос без возможных sql инъекций

        /**формат массива, Например, ['status' => 1, 'type' => 2]*/
        /*$countries = Country::find()->where([
            'code' => ['DE', 'FR', 'GB'],
            'status' => 1,
        ])->all();*/

        /**формат операторов, Например, ['like', 'name', 'test']*/
        //выведем те строки у кого в колонке name встречается сочетание букв 'ni'
        //$countries = Country::find()->where(['like', 'name', 'ni'])->all();

        /**отсортируем таблицу по численности(ASC - прямой, DESC - обратный):*/
        //$countries = Country::find()->orderBy('population ASC')->all();

        /**посчитаем сколько всего записей в таблице*/
        /*$countries = Country::find()->count();
        //так как используем цикл - то допишем что бы скрипт останавливался после 1 строки
        debug($countries, 1);*/

        /**получим первую запись таблицы*/
        //для оптимизации запроса добавляем метод limit и параметром передаем колличество записей
        //добавим условие where и укажем какую именно запись получить
        //$countries = Country::find()->limit(1)->where(['code' => 'CN'])->one();

        /** есть 2 удобных коротких метода которыми стоит пользоваться */
        //$countries = Country::findAll(['DE', 'FR', 'GB']);
        //$countries = Country::findOne('BR'); //цикл не отработает так как выводим не массив обьектов

        /*если получаемых данных много то желательно использовать метод asArray. Он позволяет получать
        данные не в виде массива объектов, а в виде массива, это облегчает запросы
        И теперь надо обращаться не к свойствам(->code), а по ключам ($countries['code'])*/
        $countries = Country::find()->asArray()->all();


        //Что бы увидеть модель - надо передать её вторым параметром в вид -> compact('model')
        // И после - можно распечатать её в виде -> debug($model)
        return $this->render('view', compact('countries'));
    }

    /** Рассмотрим работу с СОЗДАНИЕМ записей в таблице */
    public function actionCreate()
    {
        // Рассмотрим создание новых записей в таблице
        $this->view->title = 'Create';
        //если мы хотим создать новую запись в таблице - сперва необзодимо создать новый объект модели
        //для рендеринга формы всегда надо создавать объект модели
        $country = new Country();

        //поле code имеет первичный ключ и обычно автоинкремент. и по этому в большинстве случаев его не указывают
        //Задаем значения для новой записи в таблицу
        //Обычно данные задаются иначе - создают форму, вводят данные, загружают их в модель, валидируют и
        //затем вносят в таблицу. А не так как ниже
        /*$country->code = 'UA';
        $country->name = 'Ukraine';
        $country->population = '41000000';
        $country->status = '1';

        //теперь надо воспользоваться методом save, сделаем это в виде условия
        // "если метод save вернет true" то запишем что нибдуь в сессию:
        if ($country->save()) {
            \Yii::$app->session->setFlash('success', 'OK');
        }else {
            \Yii::$app->session->setFlash('error', 'error');
        }*/

// Добавим Ajax валидацию данных.
//Если данные приходят Ajax запросом -> загружаем данные в модель из массива post
        if (\Yii::$app->request->isAjax) {
            $country->load(\Yii::$app->request->post());
            //настраиваем необходимый нам формат ответа JSON
            \Yii::$app->response->format = Response::FORMAT_JSON;
            //далее необходимо вернуть результат валидации в ответ на Ajax запрос
            return ActiveForm::validate($country);
        }
// обработчик запросов так сказать.
        //если данные загружены в модель и сохранены с учётом валидации то выведем сообщение ОК и обновим страницу
        //можно убрать метод save, ввести доп данные в таблицу в обзход формы и потом уже вызвать метод save
        if ($country->load(\Yii::$app->request->post()) && $country->save()) {
            \Yii::$app->session->setFlash('success', 'OK');
            return $this->refresh();
        }


        //Что бы увидеть модель - надо передать объект модели вторым параметром в вид -> compact('model')
        //это делается для того что бы на основе модели - можно было создать форму
        /** ПЕРЕДАЕМ ОБЪЕКТ МОДЕЛИ $country В ВИДЕ СТРОКИ 'country' иначе НИХРЕНА не заработает */
        return $this->render('create', compact('country'));
    }

    /** Рассмотрим работу с ОБНОВЛЕНИЕМ записей в таблице */
    public function actionUpdate()
    {
        $this->view->title = 'Update';

        $country = Country::findOne('DE'); /* создаём объект модели(достаем его из таблицы).
 Но в отличии от случая когда надо было создавать новые объекты('$country = new Country()')
 в таблице - в данном разделе будем только обновлять или удалять данные.
 По этому не создаем Новый объект, а достаём из таблицы существующий по какому либо ключу */

        //проверим что запрашиваемый объект получен:
        //debug($country, 1);

//проверяем - Если $country вернула NULL (именно это вернется если обьекта по заданному ключу не будет в таблицу)
        if (!$country) {
            // То выводим 404 ошибку, в yii это:
            throw new NotFoundHttpException('This Country not found');
            // ошибки обрабатываются по пути config->web - errorHandler
        }

        //если запрашиваемые данные пришли и провалидировались то перезапрашиваем страницу:
        //теперь можно получать и изменять данные в таблице:
        if ($country->load(\Yii::$app->request->post()) && $country->save()) {
            \Yii::$app->session->setFlash('success', 'OK');
            return $this->refresh();
        }

        return $this->render('update', compact('country'));
    }

    /** Рассмотрим работу с УДАЛЕНИЕМ записей из таблицы */
    //данные задаем GET параметрами
    //для того что бы удалить данные нужно получить обьект который надо удалить и вызвать метод delete для него
    public function actionDelete($code = '')
    {
        //параметром укажем код страны для удаления, по умолчанию пустая строка
        $this->view->title = 'Delete';

        // получаем обьект ActiveRecord для удаления
        $country = Country::findOne($code);
        //если код страны получен(гет параметром) то применим метод удаления
        if ($country) {
            // у ActiveRecord берем метод delete и используем его
            if (false !== $country->delete()) {
                // если все что надо удалить - удалено, то выведем сообщение
                \Yii::$app->session->setFlash('success', 'OK');
            } else {
                \Yii::$app->session->setFlash('error', 'Error');
            }
        }

        return $this->render('delete', compact('country'));
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
        $model = new ResumeForm();

        return $this->render('edit-reg-resume', compact('model'));
    }

}