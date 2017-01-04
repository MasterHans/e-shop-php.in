<?php
/**
 * Created by PhpStorm.
 * User: SuvorovAG
 * Date: 04.01.2017
 * Time: 11:41
 */

namespace App\Models;

use App\Components\ActiveRecord;
use App\Components\DB;

class Category extends ActiveRecord
{
    protected static $table = 'category';

    public static function getCategoriesList()
    {
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY sort_order ASC';

        $db = new DB();
        $db->setClassName(get_called_class());
        return $db->query($sql);

    }

}