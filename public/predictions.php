<?php
session_start();
$title = "home";
include "../layout/layoutHeader.php";
?>
<?php
if ($_SESSION["id"] === null) {
    echo "<script>
        alert('Please Log in and proceed.');
        window.location.href='login.php';
        </script>";
}
require_once "../vendor/autoload.php";
$prediction = new App\prediction();
$id = $_SESSION["id"];
$sql = 'select p.id ,u.first_name,u.last_name,m.home_team,m.away_team,p.home_team_score,p.away_team_score from users as u inner join predictions as p on u.id=p.user_id inner join matches as m on m.id=p.match_id';

$result=$prediction->selectPrediction($sql);
?>
<?php
$msg = null;
?>
    <div class="container">
        <div class="row">

            <div clss="col-md-12">

                <h2>Prediction List</h2>


                <table class="table table-responsive table-bordered table-striped">
                    <tr>
                        <th>Home Team</th>
                        <th>Away Team</th>
                        <th>User</th>
                        <th>Edit</th>
                    </tr>
                    <?php

                    if ($result) {

                        while ($row=mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['home_team'] . "-" . $row['home_team_score']; ?></td>
                                <td><?php echo $row['away_team'] . "-" . $row['away_team_score'] ;?></td>
                                <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                                <td><a class="text-primary"
                                       href=<?php echo 'prediction.php?predict_id=' . $row["id"] . '&match_id=0'; ?>><i
                                                class="fa fa-pencil"></i></a></td>
                                <!--| <a class="text-danger" href=<?php #echo 'prediction.php?predict_id='. $prediction["id"].'&match_id=0'?>><i class="fa fa-minus-circle"></i></a></td>-->
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="4">No Record Found.</td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>

        </div>

    </div>
<?php

include "../layout/layoutFooter.php";
?>