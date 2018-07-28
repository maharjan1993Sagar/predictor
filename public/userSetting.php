<?php
session_start();
$title = "home";
include "../layout/layoutHeader.php";
?>
<?php
$errMsg = null;
$msg = null;

require_once "../vendor/autoload.php";

$user = new App\user();
$user->setId($_SESSION["id"]);

$query = 'SELECT * FROM users where id=' . $user->id;
$result=$user->selectUser($query);

?>
    <div class="container">
    <div class="row">
        <form action="post_user.php" method="post">
            <?php
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <input name="id" type="hidden" value="<?php echo $row["id"]; ?>">
                    <div class="col-md-12"><h2>Edit User</h2></div>

                    <?php if ($errMsg != null) {
                        ?>
                        <div class="alert alert-danger"></div>
                        <?php
                    } ?>
                    <?php if ($msg != null) {
                        ?>
                        <div class="alert alert-success"></div>
                        <?php
                    } ?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>First Name</label>
                            <input name="first_name" type="text" class="form-control" placeholder="First Name"
                                   id="txtFirstName" value="<?php echo $row["first_name"]; ?>">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="last_name" type="text" class="form-control" placeholder="Last Name"
                                   id="txtLastName" value="<?php echo $row["last_name"]; ?>">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Eamil" id="txtEmail"
                                   value="<?php echo $row["email"]; ?>">

                        </div>
                    </div>
                <?php }
            } ?>
            <div class="col-md-12"><input name="submit" type="submit" value="Submit" class="btn btn-primary"
                                          id="btnSubmit"></div>
        </form>
    </div>
    </div><?php

include "../layout/layoutFooter.php";
?>