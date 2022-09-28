<?php

// Hibaüzenet
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Debug, dd()
// // var_dump($_SERVER);
// // exit();

// Fájlok feltérképezése és betöltése
spl_autoload_register(function($className) {
    $fileName = str_replace('\\', '/', $className). '.php';
    require_once($fileName);
});

use classes\Core;
new Core();