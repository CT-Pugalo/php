<?php
include "include.php";
var_dump($_POST);
if ((isset($_POST['Titre']) && isset($_POST['Contenu']) && isset($_POST['Date']) && isset($_POST['idu']) && ($_POST['idu'] != -1 && $_POST['Titre'] != " " && $_POST['Contenu'] != " " && $_POST['Date'] != " "))) {
    $news = new News($_POST['Titre'], $_POST['Contenu'], $_POST['Date'], $_POST['idu']);
    var_dump($news);
    if (NewModel::Create($news)) {
        header("Location: index.php");
    }
} else {
    header("Location: ecrireNews.php");
}