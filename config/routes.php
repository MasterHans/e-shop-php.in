<?php
return [
    'category/([0-9]+)' => 'catalog/category/$1',  // actionCategory â CatalogController
    'catalog' => 'catalog/index', // actionIndex in CatalogController
    'product/([0-9]+)' => 'product/view/$1', // actionView â ProductController
    'news' => 'news/list', // actionIndex â NewsController
    '' => 'site/index', // actionList â ProductController
];