<?php
/**
 * Создаем класс модели для фильтра, он должен наследовать base/Model
 */

namespace app\models;


use yii\base\Model;

class FilterForm extends Model
{
    // задаем публичные свойства(атрибуты), которые потом будем заполнять данными из формы
    public $novelty; //по новизне
    public $increase; //по возрастанию
    public $decrease; //по убыванию

    public $all;
    public $man;
    public $woman;
    public $city;
    public $salary;
    public $specialization; //Специализация
    public $age;
    public $experience; //Опыт работы
    public $employment; //Тип занятости
    public $schedule; //График работы


    public $name;
    public $email;
    public $text;

    //реализуем валидацию формы посредством метода rules(возвращает массив правил валидации)
    public function rules()
    {
        //в массиве описываем поля которые должны валидироваться
        return [
            //эти поля Обязательны к заполнению => дописываем свойство(валидатор) required
            [['email', 'text'], 'required'],
            //дописываем свойство(валидатор) email для проверки корректности принятия данных
            ['email', 'email'],
            // Меняем стандартное сообщение на Другое при непрохождении валидации
            ['name', 'required', 'message' => 'ЗАПОЛНИ ПОЛЕ'],
            ['text', 'string', 'min' => 2, 'tooShort' => 'более 2 символов'],
            ['text', 'string', 'max' => 7, 'tooLong' => 'менее 7 символов блеа!'],
        ];
    }

    //labels для формы можно задавать либо в самой форме, либо в модели посредством метода:
    public function attributeLabels()
    {
        // Перечилсяем массив атрибутов с нужными нам именами
        return [
            'email' => 'E-mail:',
            'text' => 'Текст:',
        ];
    }

}