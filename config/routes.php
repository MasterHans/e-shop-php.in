<?php
return [
    'category/([0-9]+)' => 'catalog/category/$1',  // actionCategory � CatalogController
    'catalog' => 'catalog/index', // actionIndex in CatalogController
    'product/([0-9]+)' => 'product/view/$1', // actionView � ProductController
    'news' => 'news/list', // actionIndex � NewsController
    '' => 'site/index', // actionList � ProductController
];