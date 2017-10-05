<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '9R_J7mghWJjIZkfm_rkgFiC20EOHm83r',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\AdminUser',
            'enableAutoLogin' => true,//If you don't have authKey column in your DB, set enableAutoLogin field to false
            'enableSession' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'artom.golovenchik@gmail.com',
                'password' => 'Fandi8832',
                'port' => '587',
                'encryption' => 'tls',
            ],

//            'useFileTransport' => true,
        ],


        'templateManager' => [
            'class' => '\ymaker\email\templates\components\TemplateManager',
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
            'class' => 'yii\widgets\UrlManager',

            'enablePrettyUrl' => true,
            'showScriptName' => false,

// показываем идентификатор языка по умолчанию, если false, то при в корне сайта не будет виден идентификатор языка  www.site.com/   , с true – www.site.com/ru
            'rules' => [
                '/' => 'site/index',
                ''=>'site/index',
                '<action>'=>'site/<action>',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
//     configuration adjustments for 'dev' environment
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

    $config['modules']['email-templates'] = [
        'class' => '\ymaker\email\templates\Module',
        'languageProvider' => [
            'class' => '\yii2deman\tools\i18n\ConfigLanguageProvider',
            'languages' => [
                [
                    'locale' => 'ru',
                    'label' => 'Russian',
                ],
                // ...
            ],
            'defaultLanguage' => [
                'locale' => 'ru',
                'label' => 'Russian',
            ],
        ],
    ];
}

return $config;
