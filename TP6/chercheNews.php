<?php
include 'include.php';
if (isset($_GET["selectUser"]) && isset($_GET["date"])) {
    $news = NewModel::getAllFromSince($_GET["selectUser"], $_GET["date"]);
} else {
    $news = NewModel::getAllFromSince();
}
foreach ($news as $new) {
    echo $new->afficher();
}