<?php
/**
 * Created by PhpStorm.
 * User: Ra4ello
 * Date: 12.09.2018
 * Time: 10:35
 */
function __autoload($class_name)
{
    $array_paths = array(
        '/models/',
        '/components/'
    );

    foreach ($array_paths as $path){
        $path = ROOT. $path. $class_name. '.php';
        if(is_file($path)) {
            include_once $path;
        }
    }
}