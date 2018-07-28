<?php
$msg="";
$errMsg="";
include "crud.php";
$id=$_GET["id"];
$action = $_GET["permission"];
$permission=false;
if($action=="Accept")
{
    $permission=true;
}

$sql = 'select * from users where id='.$id;
$selectResult = selectData($sql);

if ($selectResult != "zero" && $selectResult != null ) {
  while($row=$selectResult->fetch_assoc()) {
      $decodePassword=base64_decode($row["password"]);
      $updateResult = updateUser($row["first_name"], $row["last_name"], $row["email"], $decodePassword, $permission, $id);
      if ($updateResult === true) {
         // echo 'success';
          //$_SESSION["email"] = $email;
          header("location:users.php");

      } else {

          echo $updateResult;
      }
  }
    }







