<?php
if(isset($_COOKIE["connue"])) {
    print_r($_COOKIE);
    setcookie("connue", "", time() - 3600);
    echo "le cookie a ete suprimer";
}
echo "<a href='existCookie.php'>verifier si le cookie existe</a>";