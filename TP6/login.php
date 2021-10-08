<?php
$formConnection = <<<HTML
<form action="connect.php" method="post">
    <label for="login">login</label>
    <input name="login" type="text">
    <label for="password">password</label>
    <input name="password" type="password">
    <button type="submit" name="bt" value="con">Connectez-vous!</button>
</form>
HTML;

echo $formConnection;