<?php
include 'User.php';
session_start();
$user = User::fromForm();
if($user->verifier()) {
    $user->connecter();
}else if(! $user->estConnecter()){
    header("Location: index.php");
    exit();
}
?>

<?php
if($user->estConnecter()){
    echo "vous etes co, bravo!";
    echo "<button><a href='deconnexion.php'>Deconnexion</a></button>";
}
?>