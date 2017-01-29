<?php
/**
 * Created by PhpStorm.
 * User: sag
 * Date: 29.01.2017
 * Time: 13:35
 */

namespace App\Controllers;

use App\Components\View;
use App\Models\User;

class UserController
{
    public function actionRegister()
    {
        $data = [];
        $data['name'] = '';
        $data['email'] = '';
        $data['password'] = '';
        $result = false;
        $errors = false;

        if (isset($_POST['submit'])) {
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];

            $errors = false;

            if (!User::checkName($data['name'])) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkEmail($data['email'])) {
                $errors[] = 'Неправильный email';
            }

            if (!User::checkPassword($data['password'])) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (User::checkEmailExists($data['email'])) {
                $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {
                $user = new User();
                $user->fillData($data);
                if ($user->save() > 0) {
                    $result = true;
                }

            }

        }

        $view = new View();
        $view->data = $data;
        $view->errors = $errors;
        $view->result = $result;

        $view->display('user/register.php');

        return true;
    }

}