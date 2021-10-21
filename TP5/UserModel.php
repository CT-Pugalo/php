<?php
include "MyPdo.php";
include "UserTP5.php";
//createx updatex delete
class UserModel {

    public static function getID(UserTP4 $user){
        $bd=MyPdo::getInstance();
        $sql=<<<SQL
        IF EXISTS (SELECT id FROM USER WHERE (login=:login, password=:password))
            SELECT id FROM USER WHERE (login=:login, password=:password);
SQL;
        if($requete=$bd->prepare($sql)){
            $login = $user->getLogin();
            $password = $user->getPassword();
            $requete->bindParam(':login', $login);
            $requete->bindParam(':password', $password);
            if($requete->execute()){
                echo "l'utilisateur a ete ajouter avec succes!";
            }else{
                echo "une erreur a ete comise...";
            }
        }
    }

    /*public static function read(int $id) : UserTP4{
        $bd=MyPdo::getInstance();
        $sql=<<<SQL
        IF EXISTS (SELECT * FROM USER WHERE (id=:id))
            SELECT id FROM USER WHERE (login=:login, password=:password);
SQL;
    }*/

    public static function create(UserTP4 $user) : int{
        $id=-1;
        $bd=MyPdo::getInstance();

        $sql=<<<SQL
            INSERT INTO USERS(login, password) VALUES(:login, :password);
SQL;
        if($requete=$bd->prepare($sql)){
            $login = $user->getLogin();
            $password = $user->getPassword();
            $requete->bindParam(':login', $login);
            $requete->bindParam(':password', $password);
            if($requete->execute()){
                $id=UserModel::getID($user);
                echo "l'utilisateur a ete ajouter avec succes!";
            }else{
                echo "une erreur a ete comise...";
            }
        }
        return $id;
    }


    public static function update(UserTP4 $user){
        $bd=MyPdo::getInstance();
        $sql=<<<SQL
        IF EXISTS (SELECT id FROM USER WHERE id=:id)
            UPDATE USER 
                SET login = :login,
                    password = :password
            WHERE id = :id 
        ELSE
            INSERT INTO USERS(login, password) VALUES(:login, :password);
SQL;
        if($requete=$bd->prepare($sql)){
            $id=$user->getId();
            $login=$user->getLogin();
            $password=$user->getPassword();
            $requete->bindParam(':id', $id);
            $requete->bindParam(':login', $login);
            $requete->bindParam(':password', $password);
            if($requete->execute()){
                echo "l'utilisateur a ete modifier avec succes!";
            }else{
                echo "une erreur a ete comise...";
            }
        }
    }

    public static function delete(UserTP4 $user){
        $bd=MyPdo::getInstance();
        $sql=<<<SQL
        IF EXISTS (SELECT id FROM USER WHERE id=:id)
            DELETE FROM UserTP4 WHERE id=:id ;
SQL;
        if($requete=$bd->prepare($sql)){
            $id=$user->getId();
            $requete->bindParam(':id', $id);
            if($requete->execute()){
                echo "l'utilisateur a ete suprimer avec succes!";
            }else{
                echo "une erreur a ete comise...";
            }
        }
    }

    public static function fromArray(array $userData) {
        $taille = count($userData);
        if($taille ==3){
            $user = new UserTP4($userData['login'], $userData['password']);
            UserModel::create($user);
        }else{
            echo "probleme dans l'array";
        }
    }

}