<?php
require_once "MyPDO.php";
class UserModel {
    public static function getID(Users $user) : int {
        $db = MyPDO::getInstance();
        $id = -1;
        $password = $user->getPassword();
        $login = $user->getLogin();
        $sql = <<<SQL
            SELECT IdU FROM utilisateurs WHERE Login=:login AND MotDePasse=:password;
SQL;
        if ($requete = $db->prepare($sql)) {
            $requete->bindParam(":login", $login);
            $requete->bindParam(":password", $password);
            if ($requete->execute()) {
                if ($reponse = $requete->fetch()) {
                    $id=$reponse['IdU'];
                }
            }
        }
        return $id;
    }
    /*start CRUD*/
    public static function Create(Users $user) : bool {
        $bool = false;
        $db = MyPDO::getInstance();
        $login = $user->getLogin();
        $password = $user->getPassword();
        $sql = <<<SQL
            INSERT IGNORE INTO utilisateurs(Login, MotDePasse) SELECT * FROM ( SELECT :login, :password) as alias
SQL;
        if ($requete = $db->prepare($sql)) {
            $requete->bindParam(":login", $login);
            $requete->bindParam(":password", $password);
            if ($requete->execute()) {
                $bool = true;
                $requete=$db->query("SELECT LAST_INSERT_ID()");
                $reponse=$requete->fetch();
                $user->setId($reponse['LAST_INSERT_ID()']);
            }
        }
        return $bool;
    }

    public static function Read(int $id) : ? Users {
        $db = MyPDO::getInstance();
        $user = null;
        $sql = <<<SQL
            SELECT * FROM utilisateurs WHERE IdU=:id;
SQL;
        if ($requete = $db->prepare($sql)) {
            $requete->bindParam(":id", $id);
            if ($requete->execute()) {
                if ($reponse = $requete->fetch()) {
                    $user = self::fromArray($reponse);
                    $user->setId($id);
                }
            }
        }
        return $user;
    }

    public static function Update(Users $user) : bool {
        $bool = false;
        $bd = MyPDO::getInstance();
        $id = $user->getId();
        $password = $user->getPassword();
        $login = $user->getLogin();
        $sql = <<<SQL
            UPDATE utilisateurs 
                SET Login=:login
                AND MotDePasse=:password
            WHERE IdU=:id;
SQL;
        if ($requete = $bd->prepare($sql)) {
            $requete->bindParam(":id", $id);
            $requete->bindParam(":login", $login);
            $requete->bindParam(":password", $password);
            if($requete->execute()){
                $bool=true;
            }
        }
        return $bool;
    }
    public static function Delete(Users $user) : bool {
        $bool = false;
        $bd = MyPDO::getInstance();
        $id = $user->getId();
        $sql = <<<SQL
            DELETE FROM utilisateurs WHERE IdU=:id;
SQL;
        if ($requete = $bd->prepare($sql)) {
            $requete->bindParam(":id", $id);
            if ($requete->execute()) {
                $bool = true;
            }
        }
        return $bool;
    }

    /*end CRUD*/

    public static function getAll(): array {
        $users = array();
        $bd = MyPDO::getInstance();
        $sql = <<<SQL
            SELECT Idu FROM utilisateurs;
SQL;
        if ($requete = $bd->prepare($sql)) {
            if ($requete->execute()) {
                if ($reponses = $requete->fetchAll()) {
                    foreach ($reponses as $reponse) {
                        $user = UserModel::Read($reponse['Idu']);
                        $user->setId($reponse['Idu']);
                        array_push($users, $user);
                    }
                }
            }
        }
        return $users;
    }

    public static function fromArray(array $liste): ?Users {
        $user = null;
        if (count($liste) == 3) {
            $user = new Users($liste['Login'], $liste['MotDePasse']);
            $user->setId(self::getID($user));
        }
        return $user;
    }

    public static function checkPassword(Users $user): bool {
        $db = MyPDO::getInstance();
        $bool = false;
        $login = $user->getLogin();
        $sql = <<<SQL
            SELECT MotDePasse FROM utilisateurs WHERE Login=:login;
SQL;
        if($requete=$db->prepare($sql)){
            $requete->bindParam(":login", $login);
            if($requete->execute()) {
                if($reponse = $requete->fetch()) {
                    if($user->getPassword() == $reponse['MotDePasse']) {
                        $bool=true;
                    }
                }
            }
        }
        return $bool;
    }
}