<?php
include 'include.php';
?>
<?php
session_start();
if(!User::estConnecter()){
    ?>
<form action="connect.php" method="post">
    <label for="login">login</label>
    <input name="login" type="text">
    <label for="password">password</label>
    <input name="password" type="password">
    <button type="submit">Connectez-vous!</button>
</form>
<?php
}else{
    echo "vous etes co";
}