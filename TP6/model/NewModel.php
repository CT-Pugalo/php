<?php

require_once "Users.php";
require_once "MyPDO.php";

class NewModel {
    /*start CRUD*/
    public static function Create(News $news): bool {
        $bool = false;
        $db = MyPDO::getInstance();
        $titre = $news->getTitre();
        $contenue = $news->getContenu();
        $idU = $news->getIdU();
        $date = $news->getDate();

        $sql = <<<SQL
            INSERT INTO news(Titre, Contenu, Date, IdU) VALUES (:titre, :contenu, :Date, (SELECT Idu FROM utilisateurs WHERE IdU=:Id));
SQL;
        if ($requete = $db->prepare($sql)) {
            $requete->bindParam(":titre", $titre);
            $requete->bindParam(":contenu", $contenue);
            $requete->bindParam(':Date', $date);
            $requete->bindParam(":Id", $idU);
            if ($requete->execute()) {
                $bool = true;
                $id = $requete = $db->query("SELECT LAST_INSERT_ID()");
                $news->setId($id);
            }

        }
        return $bool;
    }

    public static function Read(int $id) : ? News {
        $db = MyPDO::getInstance();
        $news = null;
        $sql = <<<SQL
            SELECT * FROM news WHERE Idn=:id;
SQL;
        if ($requete = $db->prepare($sql)) {
            $requete->bindParam(":id", $id);
            if ($requete->execute()) {
                if ($reponse = $requete->fetch()) {
                    $news = self::fromArray($reponse);
                }
            }
        }
        return $news;
    }

    public static function Update(News $news) : bool{
        $bool = false;
        $db = MyPDO::getInstance();
        $id = $news->getId();
        $titre = $news->getTitre();
        $contenue = $news->getContenu();
        $date=$news->getDate();
        $sql=<<<SQL
            UPDATE news 
                SET Titre=:titre
                AND Contenu=:contenu
                AND Date=:date
            WHERE IdN=:id;
SQL;
        if($requete=$db->prepare($sql)){
            $requete->bindParam(":id", $id);
            $requete->bindParam(":titre", $titre);
            $requete->bindParam(":contenu", $contenue);
            $requete->bindParam(":date", $date);
            if($requete->execute()){
                $bool=true;
            }
        }
        return $bool;
    }
    public static function Delete(News $news) : bool {
        $bool = false;
        $bd = MyPDO::getInstance();
        $id = $news->getId();
        $sql = <<<SQL
            DELETE FROM news WHERE IdU=:id;
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


    public static function fromArray(array $liste): ?News {
        $news = null;
        if (count($liste) == 5) {
            $news = new News($liste['Titre'], $liste['Contenu'], $liste['Date'], $liste['Idu']);
            $news->setId($liste['Idn']);
        }
        return $news;
    }

    public static function getAll(): array {
        $news = array();
        $bd = MyPDO::getInstance();
        $sql = <<<SQL
                SELECT * FROM news;
SQL;
        if ($requete = $bd->prepare($sql)) {
            if ($requete->execute()) {
                while ($reponse = $requete->fetch()) {
                    $reponse = NewModel::fromArray($reponse);
                    array_push($news, $reponse);
                }
            }
        }
        return $news;
    }

    public static function getAllFromSince($user = 0, string $date = ""): array {
        /*if ($date != "") {
            $date = explode('-', $date);
            $date = $date[0] . "-" . $date[2] . "-" . $date[1];
        }*/
        $user = intval($user);
        $news = array();
        $bd = MyPDO::getInstance();
        if ($user != 0 && $date != "") { //les 2 sont specifier
            $sql = <<<SQL
                SELECT Idn FROM news INNER JOIN utilisateurs as u ON news.IdU = u.Idu AND u.Idu = :Idu WHERE Date > :date ORDER BY Date DESC LIMIT 10 ;
            SQL;
            if ($requete = $bd->prepare($sql)) {
                $requete->bindParam(":Idu", $user);
                $requete->bindParam(":date", $date);
                if ($requete->execute()) {
                    if ($reponses = $requete->fetchAll()) {
                        foreach ($reponses as $reponse) {
                            $reponse = NewModel::Read($reponse['Idn']);
                            array_push($news, $reponse);
                        }
                    }
                }
            }
        } else if ($user != 0 && $date == "") { //l'utilisateur est specifier
            $sql = <<<SQL
                SELECT Idn FROM news WHERE IdU = :id ORDER BY Date DESC LIMIT 10;
            SQL;
            if ($requete = $bd->prepare($sql)) {
                $requete->bindParam(":id", $user);
                if ($requete->execute()) {
                    if ($reponses = $requete->fetchAll()) {
                        foreach ($reponses as $reponse) {
                            $reponse = NewModel::Read($reponse['Idn']);
                            array_push($news, $reponse);
                        }
                    }
                }
            }
        } else if ($user == 0 && $date != "") { //la date est specifier
            $sql = <<<SQL
                SELECT Idn, Titre, Contenu, Date, news.Idu FROM news WHERE Date >= :date ORDER BY Date DESC LIMIT 10;
            SQL;
            if ($requete = $bd->prepare($sql)) {
                $requete->bindParam(":date", $date);
                if ($requete->execute()) {
                    if ($reponses = $requete->fetchAll()) {
                        foreach ($reponses as $reponse) {
                            $reponse = NewModel::Read($reponse['Idn']);
                            array_push($news, $reponse);
                        }
                    }
                }
            }
        } else if ($user == 0 && $date == "") { //aucun est specifier
            $sql = <<<SQL
                SELECT Idn FROM news ORDER BY Date DESC LIMIT 10;
            SQL;
            if ($requete = $bd->prepare($sql)) {
                if ($requete->execute()) {
                    if ($reponses = $requete->fetchAll()) {
                        foreach ($reponses as $reponse) {
                            $reponse = NewModel::Read($reponse['Idn']);
                            array_push($news, $reponse);
                        }
                    }
                }
            }
        }
        return $news;
    }

    public static function getUser(News $news): ?Users {
        $db = MyPDO::getInstance();
        $sql = <<<SQL
            SELECT * FROM utilisateurs INNER JOIN news ON news.IdU=utilisateurs.Idu AND news.Idn=:Idn;
SQL;
        $user = null;
        if ($requete = $db->prepare($sql)) {
            $Idn = $news->getId();
            $requete->bindParam(":Idn", $Idn);
            if ($requete->execute()) {
                if ($reponse = $requete->fetch()) {
                    $user = UserModel::Read($reponse['Idu']);
                }
            }
        }
        return $user;
    }
}