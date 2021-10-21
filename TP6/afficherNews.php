<?php
include 'include.php';
$all = NewModel::getAll();
if (isset($_GET['numero'])) {
    $numero = intval($_GET['numero']) % sizeof($all);
} else {
    $numero = rand(0, sizeof($all) - 1);
}

echo $all[$numero]->afficher();