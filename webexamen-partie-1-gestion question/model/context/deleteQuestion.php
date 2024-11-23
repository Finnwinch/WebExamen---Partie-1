<?php
include_once __DIR__ . '/../dao/QuestionDAO.php' ;
include_once __DIR__ . '/../../controller/WebMaster.php';
if (QuestionDAO::deleteQuestion($_POST['id'])) {
    //WebMaster::redirectionToIndexWithActionKey("Home");
}