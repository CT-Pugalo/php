<?php
    include 'User.php';
    session_start();
    User::deConnecter();
    $_SESSION["message"] = "Vous etes deconnecter";
    header("Location: index.php");
    exit();