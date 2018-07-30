<?php
session_start();
$title="home";
include "../layout/layoutHeader.php";
?>

<?php
if($_SESSION["id"]===null)
{
    echo "<script>
        alert('Log in Required.');
        window.location.href='login.php';
        </script>";

}
require_once '../vendor/autoload.php';
$match = new App\match();

//$query = 'select * from matches';
$rows=$match->getAll();
//$result=$match->selectMatch($query);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
<h2>Matches</h2>
            <table class="table table-bordered table-striped table-responsive">
                <tr><th>Home Team</th>
                    <th>Away Team</th>
                    <th>Time</th>
                    <th>Action</th></tr>
                <?php

                    foreach($rows  as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->getHomeTeam();?></td>
                            <td><?php echo $row->getAwayTeam();?></td>
                            <td><?php echo $row->getTime();?></td>
                                <td><a  class="btn btn-primary"  href='prediction.php?predict_id=0&match_id=<?php echo $row->getId();?>'>Predict</a></td>
                        </tr>
                        <?php
                    }

                ?>
            </table>
            <a href="adminPages/createMatch.php">Create Match</a>
        </div>
    </div>
</div>
<?php
include "../layout/layoutFooter.php";
?>