<?php
include "include.php";
include "headerHTML.php";
if (!Users::estConnecter()) {
    ?>
    <body onload="afficherNewsDynamic()">
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    <?php
} else {
    $user = $_SESSION['utilisateur'];
    echo "{$user->getLogin()} ";
    echo "<a href=' deconnection.php'>Deconnection</a>";
    ?>
    <div>
        News
        <div id="destAjax"></div>
    </div>
    <?php
echo "<a href='ecrireNews.php'>Ecrire une news?</a></br>";
}
echo "<a href='chercheNews.php'>Chercher une news?</a>";