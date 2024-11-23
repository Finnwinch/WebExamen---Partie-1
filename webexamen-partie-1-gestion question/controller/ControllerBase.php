<?php

abstract class ControllerBase {
    public static string $action ;
    public function __construct(string $action) {
        self::$action = $action ;
    }
    protected static function header() : void {
        include_once 'view/inc/header.php' ;
    }
    protected static function footer() : void {
        include_once 'view/inc/footer.php' ;
    }
    public static function page(string $page) : void {
        self::header() ;
        include_once 'view/page/' . $page . '.php' ;
        self::footer() ;
    }
}