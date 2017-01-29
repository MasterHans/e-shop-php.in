<?php

namespace App\Models;

use App\Components\ActiveRecord;
use App\Components\DB;
use App\Components\E404Exception;

class User extends ActiveRecord
{
    protected static $table = 'user';

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email)
    {
        $sql = 'SELECT COUNT(*) AS count FROM user WHERE email = :email';

        $db = new DB();
        $db->setClassName(get_called_class());
        $res = $db->query($sql, [':email' => $email]);

        if (empty ($res)) {
            $e = new E404Exception('Error email verification!');
            throw $e;
        } else {
            if ($res[0]->count > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

}