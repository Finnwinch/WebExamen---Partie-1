<?php
require_once 'AccountDAOInterface.php' ;
class AccountDAO implements AccountDAOInterface {
    #[\Override] public static function create(string $username, string $password_hashed, string $courriel, TypeAccount $type = TypeAccount::student) : Account | int {
        $db = \DatabaseHelper::connection() ;
        if ($db == null) { return 0x01 ; }
        $request = $db->prepare("SELECT COUNT(USERNAME) FROM UTILISATEUR WHERE USERNAME = :USERNAME") ;
        $request->bindParam(":USERNAME",$username) ;
        $request->execute() ;
        $result = $request->fetchColumn() ;
        $request->closeCursor() ;
        if ($result == 1) { \DatabaseHelper::disconnection(); return 0x02 ; }
        $request = $db->prepare("INSERT INTO UTILISATEUR(USERNAME,PASSWORD,COURRIEL,ROLE) VALUES (:USERNAME,:PASSWORD,:COURRIEL,:ROLE)") ;
        $request->bindParam(":USERNAME",$username) ;
        $request->bindParam(":PASSWORD",$password_hashed) ;
        $request->bindParam(":COURRIEL",$courriel) ;
        $role = "student" ;
        $request->bindParam(":ROLE",$role) ;
        $request->execute() ;
        $request->closeCursor() ;
        \DatabaseHelper::disconnection();
        return new Account($username,$password_hashed,$courriel,$type) ;
    }
    #[\Override] public static function connect(string $username, string $password_hashed) : Account | bool {
        $db = \DatabaseHelper::connection() ;
        if ($db == null) { return false ; }
        $request = $db->prepare("SELECT * FROM UTILISATEUR WHERE USERNAME = :USERNAME AND PASSWORD = :PASSWORD ;") ;
        $request->bindParam(':USERNAME',$username) ;
        $request->bindParam(':PASSWORD',$password_hashed) ;
        $request->execute() ;
        $result = $request->fetchAll(PDO::FETCH_ASSOC) ;
        $request->closeCursor() ;
        $result = $result[0] ?? null ;
        if ($result == null) {
            return false ;
        }
        \DatabaseHelper::disconnection();
        $role = null ;
        switch($result["role"]) {
            case "student" : $role = TypeAccount::student ; BREAK ;
            case "teacher" : $role = TypeAccount::teacher ; BREAK ;
            case "admin" : $role = TypeAccount::admin ; BREAK ;
        }
        return new Account($username,$password_hashed,$result["courriel"],$role) ;
    }

    #[\Override] public static function delete(string $username, string $password): bool {
        $db = DatabaseHelper::connection() ;
        if ($db == null) { DatabaseHelper::disconnection(); return false ; }
        if (self::connect($username,$password) === false) { DatabaseHelper::disconnection(); return false ;}
        $request = $db->prepare("DELETE FROM UTILISATEUR WHERE USERNAME = :USERNAME AND PASSWORD = :PASSWORD") ;
        $request->bindParam(':USERNAME',$username) ;
        $request->bindParam(':PASSWORD',$password) ;
        $request->execute() ;
        $result = $request->fetchColumn() ;
        DatabaseHelper::disconnection();
        return true ;
    }
}