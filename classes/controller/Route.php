<?php

namespace classes\controller;

class Route {

    /**
     * URL cím értelmezése: POST vagy GET metódusú e a kérés? Ez alapján megfelelő switch lefuttatása.
     */
    public static function checkURLname($url) {

        // Ha POST kérés
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            self::post($url);
        }
        // Ha GET kérés
        else {
            self::get($url);
        }
    }

    /**
     * POST elérésű útvonalak
     */
    private static function post($url) {

    }

    /**
     * GET elérésű útvonalak
     */
    private static function get($url) {

    }

    /**
     * Visszaadja egy útvonal neve alapján a teljes URL címet: pl. user/create -> http://localhost/user/create
     */
    public static function url($path) {
        return $_SESSION['settings']['url'].$path;
    }

    /**
     * Átirányítja a felhasználót a megadott útvonalra, itt véget ér az adott munkafolyamat
     */
    public static function redirect($path) {
        header('Location: '.Main::url($path));
        exit();
    }

    /**
     * Átirányítja a felhasználót a megadott útvonalra, itt véget ér az adott munkafolyamat
     */
    public static function now() {
        return str_replace('/'.$_SESSION['settings']['folder'].'/', '', $_SERVER["REQUEST_URI"]);
    }
}