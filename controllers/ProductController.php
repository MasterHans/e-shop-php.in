<?php
namespace App\Controllers;

use App\Components\View;

class ProductController
{
    public function actionView($id)
    {
        $view = new View();
        $view->display('product/view.php');
        return true;
    }

}