<?php
//$msg = "";
//$errMsg = "";
//include "crud.php";
//
//$firstName = $_POST['first_name'];
//$lastName = $_POST['last_name'];
//$email = $_POST['email'];
//$password = $_POST['password'];
//$confirmPassword = $_POST['confirm_password'];
//$permission = false;
//$id = $_POST["id"];
//
//if ($password != $confirmPassword) {
//    $errMsg = "Password and Confirm Password not matched.";
//
//    header("register.php");
//    die("Password and Confirm Password not matched.");
//}
//
//if ($id == 0) {
//    $sql = 'select  id from users where email="' . $email . '"';
//    $selectResult = selectData($sql);
//
//    if ($selectResult == "zero" || $selectResult == null) {
//
//        $insertResult = insertUser($firstName, $lastName, $email, $password, $permission);
//
//        if ($insertResult === true) {
//            echo "<script>
//            alert('User Successfully Added');
//            window.location.href='home.php';
//            </script>";
//
//
//        } else {
//            echo $insertResult;
//        }
//
//    } else {
//        header("Location:register.php");
//
//    }
//} else {
//    $sql = 'select  id from users where id=' . $id;
//    $selectResult = selectData($sql);
//
//    if ($selectResult == "zero" || $selectResult == null) {
//        $row = $selectResult->fetch_assoc();
//        $updateResult = updateUser($firstName, $lastName, $email, $password, $email, $row["password"], $row["permission"], $id);
//        if ($insertResult === true) {
//            echo 'success';
//            $_SESSION["email"] = $email;
//
//            header("home.php");
//
//        } else {
//            echo $insertResult;
//        }
//    }
//
//}
require_once '../vendor/autoload.php';
$user = new App\user();

$user->setFirstNuserame($_POST['first_name']);
$user->setLastName($_POST['last_name']);
$user->setEmail($_POST['email']);
$user->setPassword($_POST['password']);
$user->setConfirmPassword($_POST['confirm_password']);
$user->setPermission(false);
$user->setId($_POST["id"]);


if ((bool)$user->isValid()) {
    $result = $user->insertUser();
    if($result)
    {
        header('location:login.php');
    }
} else {
    echo '<script>
        alert('.$user->isValid().');
        window.location.href="login.php";
        </script>';
}
