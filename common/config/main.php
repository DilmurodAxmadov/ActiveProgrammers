<?php

use yii\caching\FileCache;
use himiklab\yii2\recaptcha\ReCaptchaConfig;
use yii\i18n\PhpMessageSource;
use abdualiym\slider\Module;

$languages = [
    'ru' => [
        'id' => 0,
        'name' => 'Русский',
    ],
    'uz' => [
        'id' => 1,
        'name' => 'O`zbek tili',
    ],
    'en' => [
        'id' => 2,
        'name' => 'English',
    ],
];


$params = array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@url' => $params['siteUrl'],
        '@storageRoot' => $params['staticPath'],
        '@storageHostInfo' => $params['storageHostInfo'],
    ],
    'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'timezone' => 'Asia/Tashkent',
    'components' => [
        'cache' => [
            'class' => FileCache::class,
        ],
        'assetManager' => [
//        'bundles' => [
//            JqueryAsset::class => [
//                'jsOptions' => ['position' => View::POS_HEAD]
//            ]
//        ],
            'appendTimestamp' => true,
        ],
        'reCaptcha' => [
            'class' => ReCaptchaConfig::class,
            'siteKeyV2' => '',
            'secretV2' => '',
//            'siteKeyV3' => '',
//            'secretV3' => '',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => PhpMessageSource::class,
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
    ],
    'modules' => [
        'cms' => [ // don`t change module key
            'class' => \abdualiym\cms\Module::class,
            'storageRoot' => '@storageRoot',
            'storageHost' => '@storageHostInfo',
            'thumbs' => [ // 'sm' and 'md' keys are reserved
                'admin' => ['width' => 128, 'height' => 96],
                'thumb' => ['width' => 320, 'height' => 240],
            ],
            'languages' => $languages,
            'menuActions' => [ // for add to menu controller actions
                '' => 'Home',
                'site/contact' => 'Contacts',
                'site/blog' => 'Blog',
            ]
        ],
        'slider' => [ // don`t change module key
            'class' => Module::class,
            'storageRoot' => '@storageRoot',
            'storageHost' => '@storageHostInfo',
            'thumbs' => [ // 'sm' and 'md' keys are reserved
                'admin' => ['width' => 128, 'height' => 64],
                'thumb' => ['width' => 320, 'height' => 160],
            ],
            'languages' => $languages,
        ],
        'block' => [ // don`t change module key
            'class' => 'abdualiym\block\Module',
            'storageRoot' => '@storageRoot',
            'storageHost' => '@storageHostInfo',
            'thumbs' => [ // 'sm' and 'md' keys are reserved
                'admin' => ['width' => 128, 'height' => 128],
                'thumb' => ['width' => 320, 'height' => 320],
            ],
            'languages' => $languages,
        ],
    ],
];
