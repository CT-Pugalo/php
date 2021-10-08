<?php
include "config/DBConfig.php";
class MyPDO {
    private static ?PDO $connexion = null;
    private const options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];

    public static function getInstance() : PDO{
        if(self::$connexion == null){
            self::$connexion=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_LOGIN, DB_PASSWORD, self::options);
        }
        return self::$connexion;
    }
}