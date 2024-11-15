<?php
include_once('functions.php');

if(isset ($_POST['sign_up']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])){
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $role = 'user';
    sign_up($mail,$password,$firstname,$lastname,$role);
}
else{
    header("location:sign_up.php");
}