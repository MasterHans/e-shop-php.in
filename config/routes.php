<?php
return [
    'product/([0-9]+)' => 'product/view/$1', // actionView â ProductController
    'news' => 'news/list', // actionIndex â NewsController
    'products' => 'product/list', // actionList â ProductController
    '' => 'site/index', // actionList â ProductController
];