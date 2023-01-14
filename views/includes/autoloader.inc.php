<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if(strpos($url,'models') !== false){
        $path = '../../../controllers/';
    }
    else{
        $path = '../../controllers/';
    }

    $extension = ".class.php";
    require_once $path . $className . $extension;
}
