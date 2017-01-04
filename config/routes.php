<?php
return [
    'product/([0-9]+)' => 'product/view/$1', // actionView � ProductController
    'news' => 'news/list', // actionIndex � NewsController
    'products' => 'product/list', // actionList � ProductController
    '' => 'site/index', // actionList � ProductController
];