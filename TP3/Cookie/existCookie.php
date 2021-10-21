<?php
if(isset($_COOKIE["connue"]) || $_COOKIE["connue"] != ""){
    echo "le Cookie existe";
}else{
    echo "le Cookie n'existe pas";
}
echo "<a href='index.php'>Retour a l'index</a>";