<?php
interface AccountDAOInterface {
    public static function create(string $username,string $password_hashed,string $courriel, TypeAccount $type = TypeAccount::student) : Account | int ;
    public static function connect(string $username,string $password_hashed) : Account | bool ;
    public static function delete(string $username,string $password) : bool ;
}