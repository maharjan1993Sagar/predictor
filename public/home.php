<?php
session_start();

$title="home";
include "../layout/layoutHeader.php";

if($_SESSION["id"]===null)
{
 echo "<script>
        alert('User not logged in! Please Login.');
        window.location.href='login.php';
        </script>";
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div style="min-height: 353px;">
              <h1 class="text-center">  Welcome to Home Page.</h1>
            </div>
        </div>
    </div>
</div>

<?php include "../layout/layoutFooter.php";?>
