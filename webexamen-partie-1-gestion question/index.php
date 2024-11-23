<?php
require_once 'model/class/Account.php' ;
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebExamen</title>
    <link rel="stylesheet" href="style.css">
    <base href="/var/www/html">
</head>
<body>
    <?php
        require_once 'controller/WebMaster.php' ;
        WebMaster::redirectionToSpecificController($_GET["action"] ?? "Visitor")::setPage() ;
    ?>
</body>
</html>