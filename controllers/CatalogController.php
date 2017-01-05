<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Components\View;

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

    public function actionCategory($categoryId)
    {
        $categories = Category::getCategoriesList();
        $categoryProducts = Product::getProductsListByCategory($categoryId);

        $view = new View();
        $view->categories = $categories;
        $view->$categoryProducts = $categoryProducts;
        $view->display('catalog/category.php');
        return true;
    }

}