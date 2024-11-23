<?php
include_once 'QuestionDAOInterface.php' ;
include_once __DIR__ . '/../class/Question.php';
include_once __DIR__ . '/../../controller/DatabaseHelper.php' ;
class QuestionDAO implements QuestionDAOInterface {

    #[\Override] public static function updateQuestion(int $id, string $question): void {
        $db = \DatabaseHelper::connection() ;
        if ($db != null) {
            $request= $db->prepare("UPDATE QUESTION SET QUESTION = :QUESTION WHERE ID = :ID") ;
            $request->bindParam(":QUESTION",$question) ;
            $request->bindParam(":ID",$id) ;
            $request->execute() ;
            $request->closeCursor() ;
            DatabaseHelper::disconnection();
        }
    }

    #[\Override] public static function createQuestion(string $question): void {
        $db = \DatabaseHelper::connection() ;
        if ($db != null) {
            $request= $db->prepare("INSERT INTO QUESTION(QUESTION) VALUES(:QUESTION)") ;
            $request->bindParam(":QUESTION",$question) ;
            $request->execute() ;
            $request->closeCursor() ;
            DatabaseHelper::disconnection();
        }
    }

    #[\Override] public static function deleteQuestion(int $id): bool {
        $db = \DatabaseHelper::connection() ;
        if ($db != null) {
            $request= $db->prepare("DELETE FROM QUESTION WHERE ID = :ID") ;
            $request->bindParam(":ID",$id) ;
            $request->execute() ;
            $request->closeCursor() ;
            DatabaseHelper::disconnection();
            return true ;
        }
        return false ;
    }

    #[\Override] public static function getQuestions(): array | bool {
        $db = \DatabaseHelper::connection() ;
        if ($db != null) {
            $data = array() ;
            $request = $db->prepare("SELECT * FROM QUESTION") ;
            $request->execute() ;
            $result = $request->fetchAll(PDO::FETCH_ASSOC) ;
            $request->closeCursor() ;
            DatabaseHelper::disconnection();
            foreach($result as $row) {
                $data[] = new Question($row['id'], $row['question']);
            }
            return $data ;
        }
        return false ;
    }
}