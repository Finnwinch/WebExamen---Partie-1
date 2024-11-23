<?php
include_once __DIR__ . '/../dao/QuestionDAO.php' ;
QuestionDAO::updateQuestion($_POST['id'],$_POST['question']);