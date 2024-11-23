<?php
enum TypeAccount {
    case student ;
    case teacher ;
    case admin ;
}
class Account {
    private int $id ;
    private string $username ;
    private string $password ;
    private string $courriel ;
    private TypeAccount $type ;
    public function __construct(string $username, string $password, string $courriel, TypeAccount $typeAccount) {
        //$this->setId($id);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setCourriel($courriel);
        $this->setType($typeAccount);
    }

    //public function getId(): int { return $this->id; }
    //private function setId(int $id): void { $this->id = $id; }
    public function getUsername(): string { return $this->username; }
    private function setUsername(string $username): void { $this->username = $username; }
    public function getPassword(): string { return $this->password; }
    private function setPassword(string $password): void { $this->password = $password; }
    public function getCourriel(): string { return $this->courriel; }
    private function setCourriel(string $courriel): void { $this->courriel = $courriel; }
    public function getType(): TypeAccount { return $this->type; }
    private function setType(TypeAccount $type): void { $this->type = $type; }
}