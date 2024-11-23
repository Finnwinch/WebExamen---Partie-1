<?php

interface QuestionDAOInterface {
    public static function updateQuestion(int $id,string $question) : void ;
    public static function createQuestion(string $question) : void ;
    public static function deleteQuestion(int $delete) : bool ;
    public static function getQuestions() : array | bool ;
}