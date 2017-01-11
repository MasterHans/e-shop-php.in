<?php
namespace App\Controllers;

use App\Components\View;
use App\Models\Category;
use App\Models\Product;

class ProductController
{
    public function actionView($id)
    {
        $categories = Category::getCategoriesList();
        $product = Product::findOneByPk($id);

        $view = new View();
        $view->categories = $categories;
        $view->product = $product;
        $view->display('product/view.php');
        return true;
    }

}