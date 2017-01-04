<?php

function ownAutoload($class){

    $classParts = explode('\\', $class);
        $classParts[0] = __DIR__;
        $classParts[1] = lcfirst($classParts[1]);
        $path = implode(DIRECTORY_SEPARATOR, $classParts) . '.php';

        if (file_exists($path)) {
            require $path;
        }

}

spl_autoload_register('ownAutoload');

//Load Composer autoload.php here
//require __DIR__ . '/vendor/autoload.php';
