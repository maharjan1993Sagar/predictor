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
//include "../crud.php";

require_once '../vendor/autoLoad.php';


$sql="SELECT * FROM matches";
$result=selectData($sql);

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
                    <?php while($match=$result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $match["home_team"]?></td>
                            <td><?php echo $match["away_team"]?></td>
                            <td><?php echo $match["time"]?></td>
                            <td><a  class="btn btn-primary"  href='prediction.php?predict_id=0&match_id=<?php echo $match["id"]?>'>Predict</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <a href="../adminPages/createMatch.php">Create Match</a>
            </div>
        </div>
    </div>
<?php

include "../layout/layoutFooter.php";
?>