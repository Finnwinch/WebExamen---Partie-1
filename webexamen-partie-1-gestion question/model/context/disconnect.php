<?php
require_once '../../controller/Connection.php' ;
require_once '../../controller/WebMaster.php' ;
WebMaster::sessionGet();
Connection::disconnect("Déconnexion du compte " . $_SESSION['Compte']->getUsername() ?? "?") ;
?>