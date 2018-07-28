<?php
$title="Change Password";
session_start();
include "../layout/layoutHeader.php";
//include "crud.php";
require_once '../vendor/autoload.php';
$user=new App\user();
$id=$_SESSION["id"];
$query="Select * from users where id=".$id;
$lblUser='admin';
if($user->selectUser($query))
{
    $row=$user->selectUser($query)->fetch_assoc();
    $lblUser=$row["first_name"]." ".$row["last_name"];
}

?>
<div class="container">
    <div class="row">
        <form action="post_change_password.php" method="post">

                <input name="id" type="hidden" value="<?php echo $id;?>">
                <div class="col-md-12"><h2>Change Password</h2>
                <br><label><?php echo "You are logged in as ".$lblUser."."?></label></div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Old Password</label>
                        <input name="old_password" type="password" class="form-control" placeholder="Old Password" id="txtOldPassword" value="">

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>New Password</label>
                        <input name="password" type="password" class="form-control" placeholder="New Password" id="txtNewPassword" >

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input name="confirm_password" type="password" class="form-control" placeholder="Confirm New Password" id="txtConfirmNewPassword" >

                    </div>
                </div>
            <div class="col-md-12"><input name="submit"  type="submit" value="Submit" class="btn btn-primary" id="btnSubmit"></div>


        </form>
    </div>
</div><?php

include "../layout/layoutFooter.php";
?>
