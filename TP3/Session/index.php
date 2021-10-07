<!doctype html>
<html>
    <head>
        <meta lang="fr">
    </head>
    <body>
        <form action="connexion.php" method="post">
            <label for="login">
                login :
                <input type="text" name="login">
                <br>
            </label>
            <label for="password">
                mot de passe :
                <input type="password" name="password">
                <br>
            </label>
            <button type="submit">Se connecter</button>
            <br>
        </form>
    <?php
        include 'fonctions.php';
        afficherMessage();
    ?>
    </body>
</html>