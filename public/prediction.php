<?php
session_start();
$title="home";
include "../layout/layoutHeader.php";
?>
<?php
require_once '../vendor/autoload.php';
$prediction =new App\prediction();
$matchId=$_GET['match_id'];
$prediction->setMatchId($_GET['match_id']);
$predictId = $_GET['predict_id'];
$homeTeamScore=0;
$awayTeamScore=0;
if($predictId==0) {
    $sql = 'select * from matches where id= ' . $matchId;
   $result= $prediction->selectPrediction($sql);
   if($result)
   {
       while($match=$result->fetch_assoc())
       {
           $lblHomeTeam=$match["home_team"];
           $lblAwayTeam=$match["away_team"];
       }
   }
}
else if($matchId==0)
{
    $sql =  'select * from users as u inner join predictions as p on u.id=p.user_id and p.id='.$predictId.' inner join matches as m on m.id=p.match_id';
    $result= $prediction->selectPrediction($sql);

    if($result)
    {
        while($row=$result->fetch_assoc()) {

            $homeTeamScore = $row["home_team_score"];
            $awayTeamScore = $row["away_team_score"];
            $lblHomeTeam = $row["home_team"];
            $lblAwayTeam = $row["away_team"];
        }
    }
}
?>
<div class="container">
        <div class="row">
            <form action="post_score.php" method="post">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <h2>Make Prediction</h2>
                    <input type="hidden" name="match_id" value="<?php echo $matchId; ?>">
                    <input type="hidden" name="predict_id" value="<?php echo $predictId;?>">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo $lblHomeTeam; ?></label>
                                <input class="form-control" id="txtCountry1" type="text" name="home_score" value="<?php echo $homeTeamScore;?>">
                            </div>
                        </div> <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo $lblAwayTeam; ?></label>
                                <input class="form-control" id="txtCountry2" type="text" name="away_score" value="<?php echo $awayTeamScore;?>">
                            </div>
                        </div>
                    <input type="submit" text="Submit" class="btn btn-primary"/>
                </div>
                <div class="col-md-3"></div>
            </form>
        </div>
    </div><?php

include "../layout/layoutFooter.php";
?>