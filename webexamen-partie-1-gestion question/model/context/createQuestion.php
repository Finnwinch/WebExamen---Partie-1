<?php
include_once __DIR__ . '/../dao/QuestionDAO.php' ;
include_once __DIR__ . '/../../controller/WebMaster.php';
QuestionDAO::createQuestion($_POST['question']);