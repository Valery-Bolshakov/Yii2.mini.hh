<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    // Вносим в файл-конфиг web некоторые правки, что бы наш новый контроллер стал контроллером по умолчанию
    // устанавливаем маршрутом по умолчанию - маршрут home/index
    'defaultRoute' => 'home/index',
    // меняем язык по умолчанию на Ру
    'language' => 'ru',
    // устанавливаем настройку "name", она доступна через контейнер приложения(yii app) и меняем название сайта
    'name' => 'Yii2 mini hh',
     /*переопределяем шаблон в конфигурации. задаем шаблон который создали в папке
     views->layouts, хотя можно это было сделать в созданном ранее AppController,
     так как все остальные контроллеры его наследуют
     Можно так же задать шаблон отличный от базового прописав в любом контроллере в
     каком нибудь action для конкретного вида: $this->layout = 'имя шаблона' */
    'layout' => 'mini_hh',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'MJeJmYE9UsfmdRAy6vsDqHyfpEfkptpQ',
            // убираем лишнее из корневого адреса сайта
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // добавил это свойство, потом вспомню зачем
            'enableStrictParsing' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
