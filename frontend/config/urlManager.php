<?php

use codemix\localeurls\UrlManager;

return [
    'class' => UrlManager::class,
    'hostInfo' => $params['siteUrl'],
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => false,
    'languages' => ['ru', 'uz', 'en'],
    'enableLanguageDetection' => false,
    'enableDefaultLanguageUrlCode' => true,
    'ignoreLanguageUrlPatterns' => [
        // route pattern => url pattern
    ],
    'rules' => [
        '' => 'site/index',
        '/contact' => 'site/contact',
        'page/<slug:[a-z-0-9_]+>' => 'site/page',
        'blog/<slug:[a-z-0-9_]+>' => 'blog/index',
        'blog/view/<slug:[a-z-0-9_]+>' => 'blog/view',
//        'result' => 'result/index',

        '<_c:[\w\-]+>' => '<_c>/index',
        '<_c:[\w\-]+>/<id:[\d+]+>' => '<_c>/view',
        '<_c:[\w\-]+>/<_a:[\w-]+>' => '<_c>/<_a>',
    ],];
