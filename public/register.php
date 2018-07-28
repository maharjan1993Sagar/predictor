<?php
$title="home";
include "../layout/layoutHeader.php";
?>
<?php

?>
<?php
$errMsg=null;
$msg=null;

?>
<div class="container">
 <div class="row">
     <form action="post_user.php" method="post">
         <div class="col-md-12"><h2>Register</h2></div>

<?php if($errMsg!=null){
    ?>
   <div class="alert alert-danger"></div>
         <?php
}?>
         <?php if($msg!=null){
             ?>
             <div class="alert alert-success"></div>
             <?php
         }?>
         <input name="id" value="0" type="hidden">
     <div class="col-md-4">
         <div class="form-group">
             <label>First Name</label>
             <input name="first_name" type="text" class="form-control" placeholder="First Name" id="txtFirstName" required>

         </div>
     </div>
         <div class="col-md-4">
             <div class="form-group">
                 <label>Last Name</label>
                 <input name="last_name" type="text" class="form-control" placeholder="Last Name" id="txtLastName" required>

             </div>
         </div>
         <div class="col-md-4">
             <div class="form-group">
                 <label>Email</label>
                 <input name="email" type="email" class="form-control" placeholder="Eamil" id="txtEmail" required>

             </div>
         </div>
     <div class="col-md-6">
         <div class="form-group">
             <label>Password</label>
             <input name="password" type="password" class="form-control" placeholder="Password" id="txtPass" required>

         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label>Confirm Password</label>
             <input name="confirm_password" type="password" class="form-control" placeholder="Confirm Password" id="txtContirmPass" required>

         </div>

     </div>

         <div class="col-md-12"><input name="submit"  type="submit" value="Submit" class="btn btn-primary" id="btnSubmit"></div>


     </form>
</div>
</div><?php

include "../layout/layoutFooter.php";
?>