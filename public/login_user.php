<?php
session_start();
require_once '../vendor/autoload.php';
$user = new App\user();

$user->setEmail($_POST['user_name']);
$user->setPassword($_POST['password']);
if ($user->loginUser()) {
    header("location:matches.php");
} else {
    echo "<script>
        alert('Invalid UserName or Password.');
        window.location.href='login.php';
        </script>";
}


