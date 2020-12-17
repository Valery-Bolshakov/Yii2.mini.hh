<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Комплект основных ресурсов приложения.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    // подключаем готовые файлы css
    public $css = [
        '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        'css/main.css',
        '//fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap',
        'css/jquery.nselect.css',
        'css/bootstrap-datepicker.css',
    ];

    // подключаем готовые файлы js
    public $js = [
        '//kit.fontawesome.com/a4e584b747.js',
        // не понял почему но эти 2 файла вызывали ошибку при работе с формами
        //'//code.jquery.com/jquery-3.2.1.slim.min.js',
        //'//code.jquery.com/jquery-3.5.1.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
        '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
        'js/main.js',
        'js/jquery.nselect.min.js',
        'js/bootstrap-datepicker.js',
        'js/bootstrap-datepicker.ru.min.js',
        'js/jquery-editable-select.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
