<?php
include 'MyPDO.php';
include 'News.php';
class NewModel {
    /*start CRUD*/
    public static function Create(News $news) : bool {
        $bool = false;
        $db = MyPDO::getInstance();
        $id = $news->getId();
        $titre = $news->getTitre();
        $contenue = $news->getContenu();
        $idU = $news->getIdU();
        $date=$news->getDate();

        $sql = <<<SQL
            INSERT INTO news(Idn, Titre, contenu, Date, IdU) VALUES (Idn=:idn, Titre=:titre, Contenu=:contenue, Date=:Date, IdU=:idu);
SQL;
        if ($requete = $db->prepare($sql)) {
            $requete->bindParam(":idn", $id);
            $requete->bindParam(":titre", $titre);
            $requete->bindParam(":contenue", $contenue);
            $requete->bindParam(':Date', $date);
            $requete->bindParam(":idu", $idU);
            if ($requete->execute()) {
                $bool = true;
            }

        }
        return $bool;
    }

    public static function Read(int $id) : ? News{
        $db=MyPDO::getInstance();
        $news=null;
        $sql=<<<SQL
            SELECT * FROM news WHERE Idn=:id;
SQL;
        if($requete=$db->prepare($sql)){
            $requete->bindParam(":id", $id);
            if($requete->execute()) {
                if($reponse = $requete->fetch()) {
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
    public static function Delete(News $news) : bool{
        $bool=false;
        $bd=MyPDO::getInstance();
        $id=$news->getId();
        $sql=<<<SQL
            DELETE FROM news WHERE IdU=:id;
SQL;
        if($requete=$bd->prepare($sql)){
            $requete->bindParam(":id", $id);
            if($requete->execute()){
                $bool=true;
            }
        }
        return $bool;
    }
    /*end CRUD*/



    public static function fromArray(array $liste) : ?News{
        if(count($liste)==5){
            return new News($liste['Idn'], $liste['Titre'], $liste['Contenue'], $liste['Date'], $liste['IdU']);
        }
        else{
            return null;
        }
    }
}