<?php
setlocale(LC_TIME, "fr_FR");
if(!isset($_COOKIE["connue"])){
    print_r($_COOKIE);
    echo "Je ne vous connaissais pas mais maintenant si!";
    setcookie("connue", time()+3600);
}else{

    echo "Je vous connais!";
}
?>
<html>
<head>
    <meta lang="fr">
</head>
<body>
<a href="suprCookie.php">Suprimer cookie</a>
<a href="existCookie.php">Verifier si le cookie existe</a>
</body>
</html>
