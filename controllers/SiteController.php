<?php
namespace App\Controllers;

use App\Components\View;
use App\Models\Category;
use App\Models\Product;

class SiteController
{
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();
        $products = Product::getLatestProducts(3);

        $view = new View();
        $view->categories = $categories;
        $view->products = $products;
        $view->display('site/index.php');
        return true;
    }
}