<!DOCTYPE html>
<html>
    <head>
        <meta lang="fr">
        <title>Ajout</title>
    </head>
    <body>
        <form action="ajouter.php" method="post">
            <label for="textArea">text: </label>
            <input name="textArea" type="text" placeholder="Votre text">
            <input type="submit" value="Verifier">
        </form>
    </body>
</html>


<?php
$text=$_POST["textArea"];
$file = file("bd.txt");
if(isset($text) && $text!=""){
    array_push($file, $text);
    file_put_contents("bd.txt", $file);
    print_r(file("bd.txt"));
}else {
    echo "Erreur, le texte est invalide";
}
echo "<a href='index.php'>Retour a la page d'acceuil</a>"
?>