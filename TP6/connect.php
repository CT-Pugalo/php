<?php
include 'include.php';

if((isset($_POST['login']) && $_POST['login']!=' ') && (isset($_POST['password']) && $_POST['password']!=' ')){
    $user = User::fromForm();
    if($user->check()){
        echo "Vous avez reussi!";
    }
    else{
        echo "Vous avez pas reussi...";
    }
}