<?php
include 'include.php';
$users = UserModel::getAll();
?>

    <form method="GET" action="chercheNews.php">
        <label>
            Auteur
            <select id="selectUser" name="selectUser">
                <option value="">--Selectionner pour filtrer--</option>
                <?php
                foreach ($users as $user) {
                    $login = $user->getLogin();
                    $id = $user->getId();
                    echo "<option value='{$id}'>$login</option>";
                }
                ?>
            </select>
        </label>
        <label>
            Date
            <input type="date" name="date">
        </label>
        <button type="submit">Fitrer</button>
    </form>

<?php
if (isset($_GET["selectUser"]) && isset($_GET["date"])) {
    $news = NewModel::getAllFromSince($_GET["selectUser"], $_GET["date"]);
} else {
    $news = NewModel::getAllFromSince();
}
foreach ($news as $new) {
    echo $new->afficher();
}