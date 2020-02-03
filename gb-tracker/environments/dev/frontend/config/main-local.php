<?php

$config = [
    'components' => [
        'request' => [
            'cookieValidationKey' => '678687y78g678t7gtyfig678gbt79ighby7ihbgy79',
        ],
    ],
];

if (!YII_ENV_TEST) {
    
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
