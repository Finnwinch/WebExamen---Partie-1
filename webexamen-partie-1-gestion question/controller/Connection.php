<?php

require_once 'ControllerBase.php' ;
require_once 'WebMaster.php' ;
require_once 'DatabaseHelper.php' ;
require_once __DIR__ . '/../model/dao/AccountDAO.php';
class Connection extends ControllerBase {
    public static function setPage() : void {
        switch(self::$action) {
            case "Inscription" : {
                self::page("register") ;
                break ;
            }
            case "Connexion" : {
                self::page("home") ;
                break ;
            }
        }
    }
    public static function register() : void {
        switch($_SERVER['REQUEST_METHOD']) {
            case 'POST' : {
                WebMaster::sessionGet();
                if (!isset($_SESSION['Compte'])) {
                    if ($_POST['password'] != $_POST['passwordcheck']) {
                        $_SESSION['message'] = "Veuillez entre le même mot de passe";
                        WebMaster::redirectionToIndexWithActionKey("Inscription&ErrorRegister");
                        return ;
                    }
                    $account = AccountDAO::create($_POST['username'],$_POST['password'],$_POST['courriel']) ;
                    if ($account instanceof Account) {
                        $_SESSION['Compte'] = $account;
                        $_SESSION['message'] = "Bienvenue " . $_SESSION['Compte']->getUsername() . ", votre compte est prêt.";
                        WebMaster::redirectionToIndexWithActionKey("Home");
                    } else {
                        switch ($account) {
                            case 0x01:
                                $_SESSION['message'] = "Problème avec la base de données.";
                                WebMaster::redirectionToIndexWithActionKey("Inscription&ErrorRegister");
                                break;

                            case 0x02:
                                $_SESSION['message'] = "Vous ne pouvez pas créer un compte qui existe déjà.";
                                WebMaster::redirectionToIndexWithActionKey("Inscription&ErrorRegister");
                                break;

                            default:
                                $_SESSION['message'] = "Erreur inconnue lors de la création du compte.";
                                WebMaster::redirectionToIndexWithActionKey("Inscription&ErrorRegister");
                                break;
                        }
                    }
                }
            }
        }
    }
    public static function connect() : void {
        WebMaster::sessionGet();
        switch($_SERVER['REQUEST_METHOD']) {
            case 'POST' : {
                $account = AccountDAO::connect($_POST['username'],$_POST['password']) ;
                if ($account !== false) {
                    $_SESSION['Compte'] = $account ;
                    WebMaster::redirectionToIndexWithActionKey("Home");
                } else {
                    $_SESSION['message'] = "\nLe compte de " . $_POST['username'] . " n'as pas pus se connecter" ;
                    WebMaster::redirectionToIndexWithActionKey("Inscription&ErrorConnect");
                }
            }
        }
    }
    public static function disconnect(string $message) : void {
        WebMaster::sessionGet();
        $username = $_SESSION['Compte']->getUsername() ;
        session_destroy();
        WebMaster::redirectionToIndexWithActionKey("Visitor&message=" . $message) ;
    }
    public static function delete() : bool {
        switch($_SERVER['REQUEST_METHOD']) {
            case 'POST' : {
                WebMaster::sessionGet();
                $username = $_SESSION['Compte']->getUsername() ;
                if ($username == "admin") { return false ;}
                if (AccountDAO::delete($_POST['usernameDel'],$_POST['passwordDel'])) {
                    self::disconnect("Suppresion du compte " . $username);
                }
            }
        }
        return false ;
    }
}