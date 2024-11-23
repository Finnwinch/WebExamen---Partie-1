<?php

class Question {
    private int $id ;
    private string $question ;

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getQuestion(): string {
        return $this->question;
    }

    public function setQuestion(string $question): void {
        $this->question = $question;
    }

    public function __construct(int $id,string $question) {
            self::setId($id);
            self::setQuestion($question);
    }
}