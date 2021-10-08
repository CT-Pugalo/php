<?php
include "MyPpo.php";
$sql=<<<SQL
SELECT * FROM USERS;
SQL;

$bd = MyPdo::getInstance();

if($requete = $bd->prepare($sql)){
    if($requete->execute()){
        while($ligne = $requete->fetch()){
            echo "id={$ligne['id']} login={$ligne['login']} password={$ligne['password']}";
            echo "<br>";
        }
    }
}