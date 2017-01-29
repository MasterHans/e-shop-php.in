<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Components\View;
use App\Components\Pagination;

class CatalogController
{
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();
        $products = Product::getLatestProducts(12);

        $view = new View();
        $view->categories = $categories;
        $view->products = $products;
        $view->display('catalog/index.php');
        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
        echo 'Category: ' . $categoryId;
        echo '<br>Page:' . $page;

        $categories = Category::getCategoriesList();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        $view = new View();
        $view->categoryId = $categoryId;
        $view->categories = $categories;
        $view->pagination = $pagination;
        $view->categoryProducts = $categoryProducts;
        $view->display('catalog/category.php');
        return true;
    }

}