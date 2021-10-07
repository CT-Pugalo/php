<?php
include "config/DBConfig.php";
class MyPDO {
    private static ?PDO $connexion = NULL;
    private const options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];
    public static function getInstance():PDO{
        if(self::$connexion==NULL){
            self::$connexion=new PDO('mysql:host='.DB_HOST.';dbname='.DB_Name.';charset=utf8', DB_Login, DB_Password, self::options);
        }
        return self::$connexion;
    }

}