<?php
    include 'UserTP4.php';
    session_start();
    UserTP4::deConnecter();
    $_SESSION["message"] = "Vous etes deconnecter";
    header("Location: index.php");
    exit();