<?php
    include 'fonctions.php';
    deconnecter();
    $_SESSION["message"] = "Vous etes deconnecter";
    header("Location: index.php");
    exit();
?>