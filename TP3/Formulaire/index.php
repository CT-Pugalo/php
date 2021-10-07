<?php
$fileName = "bd.txt";
if(!file_exists($fileName)){
    echo "erreur, le fichier $fileName n'existe pas";
    $file = fopen($fileName, "w");
}else{
    $file = file($fileName);
}
print_r($file);
echo "<br><a href='ajouter.php'>Ajouter</a>";