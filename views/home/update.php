<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="container">
    <h3> Работа с операцией <?= $this->title ?></h3>
    <!-- выводим флэшСообщение если нужно -->
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <!-- выводим флэшСообщение если нужно -->
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>

    <?php
    $form = ActiveForm::begin([
        // задаём идентификатор формы
        'id' => 'my-form',
        // задаем массив дополнительных настроек
        'options' => [
            'class' => 'form-horizontal',//не отрабатывает из-за кривости подключаемых скриптов наверное
        ],
        /*Свойства для каждого инпута можно задавать как лично, так и общие для всех*/
        'fieldConfig' => [
            'template' => "{label} \n <div class='col-md-3'> {input} </div> \n <div
            class='col-md-3'> {hint} </div> \n <div class='col-md-3'> {error} </div>",
            'labelOptions' => ['class' => 'col-md-2 control-label'],
        ]
    ]);
    ?>

    <?= $form->field($country, 'name') ?>
    <?= $form->field($country, 'population') ?>
    <?= $form->field($country, 'status')->checkbox([
        'template' => "{label} \n <div class='col-md-3'> {input} </div> \n <div
            class='col-md-3'> {hint} </div> \n <div class='col-md-3'> {error} </div>",
        'labelOptions' => ['class' => 'col-md-2 control-label'],
    ], false) ?>
    <!--dropDownList Ключи массива - это значения параметров, валидацию которых мы задаем в модели Country
    а значения массива - соответствующие метки параметров(то что видим в выпадающем списке в браузере)-->
    <? /*= $form->field($country, 'status')->dropDownList([0 => 'status 0', 1 => 'status 1']) */ ?>


    <div class="form-group">
        <div class="col-md-3">
            <?= Html::submitButton('отправить', ['class' => 'btn btn-default btn-block']) ?>
        </div>
    </div>

    <?php ActiveForm::end() ?>
</div>


