<?php

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = ['class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '192.168.0.62', '::1', '192.168.33.10', '192.168.33.1']
    ];

    $config['bootstrap'][] = 'gii';
    //   $config['modules']['gii'] = 'yii\gii\Module';
    $config['modules']['gii'] = ['class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '192.168.0.62', '::1', '192.168.33.10', '192.168.33.1']
    ];
}

return $config;
