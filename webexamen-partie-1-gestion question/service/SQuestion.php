<?php
include_once 'model/dao/QuestionDAO.php' ;
class SQuestion {
    public static function getQuestions() {
        return QuestionDAO::getQuestions() ;
    }
}