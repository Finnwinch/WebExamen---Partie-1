<?php
require_once 'ControllerBase.php' ;
class Generique extends ControllerBase {
    public static function setPage() : void {
        self::header();
        switch(self::$action) {
            case "Visitor" : {
                self::page("visitor") ;
                break ;
            }
            case "Home" : {
                self::page("home");
                break ;
            }
        }
       self::footer();
    }
}