<?php
session_start();
require_once '../vendor/autoload.php';
$user=new App\user();
//include "crud.php";

$user->setPassword($_POST['password']);
$user->setConfirmPassword($_POST['confirm_password']);
$user->setId($_POST["id"]);
$email=$_SESSION['email'];

$selectQuery ='select * from users where email='.$email;
if($user->selectUser($selectQuery)) {
    $row = $user->selectUser($selectQuery)->fetch_assoc();
    if (password_verify($_POST['old_password'], $row['password'])) {
        if ($user->changePassword()) {
            header("location:home.php");
        }
    }
}
else
    {
        header("location:changePassword.php");
    }






