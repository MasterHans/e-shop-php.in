<?php
namespace App\Models;

use App\Components\ActiveRecord;
use App\Components\DB;
use App\Components\E404Exception;

class Product extends ActiveRecord
{
    protected static $table = 'product';
    const SHOW_BY_DEFAULT = 10;

    /**
     * Returns an array of products
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $sql = 'SELECT id, name, price, image, is_new FROM ' . static::$table
            . ' WHERE status = "1"'
            . ' ORDER BY id DESC '
            . ' LIMIT ' . $count;

        $db = new DB();
        $db->setClassName(get_called_class());
        return $db->query($sql);

    }

    public static function getProductsListByCategory($categoryId = false)
    {
        if ($categoryId) {
            $sql = "SELECT id, name, price, image, is_new FROM " . static::$table
                . "WHERE status = '1' AND category_id = '$categoryId' "
                . ' ORDER BY id DESC '
                . ' LIMIT ' . self::SHOW_BY_DEFAULT;

            $db = new DB();
            $db->setClassName(get_called_class());
            $res = $db->query($sql);

            if (empty ($res)) {
                $e = new E404Exception('Can not find category!');
                throw $e;
            } else {
                return $res;
            }
        }
        return false;
    }

}