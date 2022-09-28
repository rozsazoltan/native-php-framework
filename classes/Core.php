<?php

namespace classes;

use classes\database\Database;
use classes\controller\Route;

class Core {

    /**
     * Applikáció létrehozása
     */
    public function __construct()
    {
        $this->start();
    }

    /**
     * Applikáció felépítése, elindítása
     */
    private function start()
    {
        // Munkamenet változók tárolásának elindítása (ha bezárul a böngésző ezek elvesznek)
        session_start();

        $this->loadConfigs();
        $this->loadDatabase();
        
        // A beütött URL cím alapján kód lefuttatása
        Route::checkURLname(Route::now());
    }

    /**
     * Beállítások betöltése
     */
    private function loadConfigs()
    {
        $_SESSION['settings'] = include_once '../config/settings.php';
    }

    /**
     * Adatbázis betöltése
     */
    private function loadDatabase()
    {
        if(Route::now() != "/error500") {
            (new Database())->setDB();
        }
    }
}