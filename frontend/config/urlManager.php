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
];
