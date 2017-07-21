<?php

return [
    'components' => [
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
        ],
    ],
    'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'on beforeRequest' => function ($event) {
        if(!Yii::$app->request->isSecureConnection) {
            $url = Yii::$app->request->getAbsoluteUrl();
            $url = str_replace('http:', 'https://', $url);
            Yii::$app->getResponse()->redirect($url);
            Yii::$app->end();
        }
        $pathInfo = Yii::$app->request->pathInfo;
        if (!empty($pathInfo) && substr($pathInfo, -1) === '/') {
            Yii::$app->response->redirect('/' . substr(rtrim($pathInfo), 0, -1), 301)->send();
            Yii::$app->end();
        }
    },
];
