<?php
require_once '../../controller/Connection.php' ;
require_once '../../controller/WebMaster.php' ;
if (!Connection::delete()) {
    WebMaster::redirectionToIndexWithActionKey("Home");
} ;
?>