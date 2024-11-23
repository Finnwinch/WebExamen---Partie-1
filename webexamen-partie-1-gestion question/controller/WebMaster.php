<?php
require_once 'Connection.php' ;
require_once 'Generique.php' ;
require_once __DIR__ . '/../model/class/Account.php' ;
require_once __DIR__ . '/../model/class/Account.php' ;
class WebMaster {
    //public static MessageManager $messages = new MessageManager() ;
    public static function redirectionToSpecificController(string $controllerAction) : Connection | Generique {
        return match ($controllerAction) {
            "Connexion", "Inscription" => new Connection($controllerAction),
            "Visitor", "Home" => new Generique($controllerAction),
        };
    }
    public static function redirectionToIndexWithActionKey(string $actionKey) {
        echo <<<HTML
        <script> 
            window.location.href = "/index.php?action=$actionKey"
        </script>
        HTML ;
    }
    public static function sessionIsValid() : bool {
        return isset($_SESSION['Compte']) ;
    }
    public static function sessionGet() : void {
        if (session_status() == PHP_SESSION_NONE) { session_start(); }
    }
}