<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=igosja_moviten',
            'username' => 'igosja_moviten',
            'password' => 'oum4phodoKe2opa_',
            'charset' => 'utf8',
            'schemaCache' => 'cache',
            'schemaCacheDuration' => 3600,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => true,
        ],
    ],
];
