<?php
session_start();
$title = "home";
include "../layout/layoutHeader.php";
?>
<?php

require_once '../vendor/autoload.php';

$user = new App\user();

if ($_SESSION["id"] === null) {
    echo "<script>
        alert('Log in Required.');
        window.location.href='login.php';
        </script>";
}
$query = 'SELECT * FROM users';
$result=$user->selectUser($query);
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Registered Users</h2>
                <table class="table table-bordered table-striped table-responsive">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Permission</th>
                        <th class="text-center">Accept | Deny</th>
                    </tr>
                    <?php if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row["first_name"] ?></td>
                                <td><?php echo $row["last_name"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <td><?php if ($row["permission"]) {
                                        echo "Accepted";
                                    } else {
                                        echo "Denied";
                                    } ?></td>
                                <td class="text-center"><a
                                            href="<?php echo 'grant_permission.php?permission=Accept&id=' . $row['id'] ?>"
                                            class="text-success" tooltip="Accept"><i class="fa fa-check"></i></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a
                                            href='grant_permission.php?permission=Deny&id=<?php echo $row["id"] ?>'
                                            class="text-danger"
                                            tooltip="Deny"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <?php
                        }
                    } ?>
                </table>
                <span><a href="register.php">Register</a></span>|<span><a
                            href="userSetting.php">Change Personal Info.</a></span>|<span><a href="changePassword.php">Change Password</a></span>|<span><a
                            href="logout.php">Logout</a></span>
            </div>
        </div>
    </div>
<?php

include "../layout/layoutFooter.php";
?>