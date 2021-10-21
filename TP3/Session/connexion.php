<?php
include 'fonctions.php';
if(verifier()) {
    connecter();
}else if(!estConnecter()){
    $_SESSION["message"] = "Login ou mot de passe incorrect";
    header("Location: index.php");
    exit();
}
?>

<?php
if(estConnecter()){
    echo "vous etes co, bravo!";
    echo "<button><a href='deconnexion.php'>Deconnexion</a></button>";
}
?>