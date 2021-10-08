<?php
require_once "MyPDO.php";
class NewModel {
    /*start CRUD*/
    public static function Create(News $news) : bool {
        $bool = false;
        $db = MyPDO::getInstance();
        $titre = $news->getTitre();
        $contenue = $news->getContenu();
        $idU = $news->getIdU();
        $date=$news->getDate();

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
        if (count($liste) == 5) {
            return new News($liste['Titre'], $liste['Contenu'], $liste['Date'], $liste['IdU']);
        } else {
            return null;
        }
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
}