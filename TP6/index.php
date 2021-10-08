<?php

include "include.php";
if (!Users::estConnecter()) {
    ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php
} else {
    $user = new Users($_SESSION['utilisateur']['login'], $_SESSION['utilisateur']['password']);
    echo "{$user->getLogin()} ";
    echo "<a href=' deconnection.php'>Deconnection</a>";
    ?>
    <div>
        News
        <div>
            <?php
            $all = NewModel::getAll();
            foreach ($all as $news) {
                echo <<<HTML
                <div>
                ***<br>
                    {$news->getTitre()}
                </div>
                <div>
                    <p>{$news->getContenu()}</p>
                </div>
***<br>
HTML;
            }
            ?>
        </div>
    </div>
    <?php
    echo "<a href='ecrireNews.php'>Ecrire une news?</a>";
}