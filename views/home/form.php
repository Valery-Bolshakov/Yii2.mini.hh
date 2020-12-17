<!-- Создали главный вид index -->
<!-- Перенесли контентную часть из шаблона views->layout->mini_hh -->

<!-- Закоментировал некоторые элементы, которые не отображаются.
При изменении порядка подключения скриптов и стилей - становятся видимыми. -->
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title = 'Список резюме';
// устанавливаем мета-теги для данного вида, второй параметр (description) нужен для проверки уникальности
$this->registerMetaTag(['name' => 'description', 'content' => 'мета-описание...'], 'description');

// смотрим что передает $model
//debug($model);
?>

<div class="container">
    <!-- выводим флэшСообщение если нужно -->
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Оборачиваем форму в виджет Pjax-->
    <?php Pjax::begin([
        // Опции Pjax
    ]);

    //передаем массив свойств в метод begin-
    $form = ActiveForm::begin([
        // задаём идентификатор формы
        'id' => 'my-form',
        // задаем массив дополнительных настроек
        'options' => [
            'data' => ['pjax' => true], // Либо 'data-pjax' => true, - такой вариант применяем если атрибут 1
            'class' => 'form-horizontal',
        ],
        // меняем метод передачи данных на get
        //'method' => 'get',
        // Включаем либо выключаем Ajax валидацию для всей формы:
        'enableAjaxValidation' => true,
        // Включаем либо Выключаем валидацию на стороне клиента
        'enableClientValidation' => true,
        /*Свойства для каждого инпута можно задавать как лично, так и общие для всех*/
        'fieldConfig' => ['template' => "{label} \n <div class='col-md-3'> {input} </div> \n <div
 class='col-md-3'> {hint} </div> \n <div class='col-md-3'> {error} </div>",
            'labelOptions' => ['class' => 'col-md-2 control-label'],
        ]
    ]); ?>
    <!-- вызываем в форме метод field с первым параметром $model и далее параметрами свойства
    модели которые должны там быть -->
    <!-- Можно задавать Ajax валидацию только для одного поля -->
    <?= $form->field($model, 'name', ['enableAjaxValidation' => true])
        ->textInput(['placeholder' => 'введите имя'])->label('Имя:')

    /* $form->field($model, 'name', [
        'template' => "{label} \n <div class='col-md-3'> {input} </div> \n <div
class='col-md-3'> {hint} </div> \n <div class='col-md-3'> {error} </div>",
        'labelOptions' => ['class' => 'col-md-2 control-label'],
    ])->textInput(['placeholder' => 'введите имя'])->label('Имя:')->hint('fill in this - Явная подсказка')*/

    ?>

    <?= $form->field($model, 'email')->input('email', ['placeholder' => 'введите email'])
    /*->passwordInput()*/ ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 3, 'placeholder' => 'введите текст']) ?>

    <div class="form-group">
        <div class="col-md-3">
            <?= Html::submitButton('отправить', ['class' => 'btn btn-default btn-block']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>

</div>

<!--Опишем Ajax отправку данных:(это можно сделать в файле подключения ресурсов)-->
<?php
// создадим переменную form и запишем в нее id нашей формы что бы можно было обращаться к ней
$js = <<<JS
var form = $('#my_form');
/*привязываемся к событию beforeSubmit, по которому выполняем функцию*/
form.on('beforeSubmit', function(){
    /*при помощи jquery - метода serialize берем данные из формы и...*/
    var data = form.serialize();
    /* и далее выполняем ajax запрос*/
    $.ajax({
    /*url на который будут отправлены данные берем из атрибута формы action*/
    uri: form.attr('action'),
    type: 'POST',
    /*данные берем тоже из формы*/
    data: data,
    /*и далее если если все пришло норм то очищаем форму, иначе выводим сооьшение об ошибке*/
    success: function(res) {
        console.log(res);
        form[0].reset();
    },
    error: function() {
alert('Error!');      
    }
    });
    /* return false нужен для отмены дефолтного события(оправки формы)*/
    return false;
});
JS;

// регистрируем данный скрипт
$this->registerJs($js);



?>
