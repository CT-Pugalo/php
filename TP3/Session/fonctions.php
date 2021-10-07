<?php
session_start();

define("LOGIN","Toto");
define("PASSWORD","Tata");
function connecter(){
    if(verifier()) $_SESSION["connect"]=true;
}
function estConnecter() : bool{
    $estConnecter=false;
    if($_SESSION["connect"]==true) $estConnecter=true;
    return $estConnecter;
}
function deconnecter(){
    if(estConnecter()) $_SESSION["connect"]=false;
}
function verifier() : bool{
    $_SESSION["message"]="";
    $valide=false;
    if((isset($_POST["login"]) || $_POST["login"] != "")&&(isset($_POST["password"]) || $_POST["password"] != "")){
        if($_POST["login"]==LOGIN && $_POST["password"]==PASSWORD) $valide=true;
    }
    return $valide;
}

function afficherMessage(){
    $message = $_SESSION["message"];
    echo "$message";
}