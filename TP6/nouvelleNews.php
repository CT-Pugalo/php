<?php
include "include.php";
if ((isset($_POST['Titre']) && isset($_POST['Contenu']) && isset($_POST['Date']) && isset($_POST['idu']) && ($_POST['idu'] != -1 && $_POST['Titre'] != " " && $_POST['Contenu'] != " " && $_POST['Date'] != " "))) {
    $news = new News($_POST['Titre'], $_POST['Contenu'], $_POST['Date'], $_POST['idu']);
    if (NewModel::Create($news)) {
        header("Location: index.php");
    }
} else {
    header("Location: ecrireNews.php");
}