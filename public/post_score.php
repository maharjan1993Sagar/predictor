<?php
session_start();
require_once '../vendor/autoload.php';
$prediction = new App\prediction();

$prediction->setUserId($_SESSION["id"]);
$prediction->setMatchId($_POST['match_id']);
$prediction->setHomeTeamScore($_POST['home_score']);
$prediction->setAwayTeamScore($_POST['away_score']);
$predictId = $_POST['predict_id'];
$prediction->setId($predictId);


if ($predictId == 0) {
    $selectQuery = 'select  id from predictions where match_id="' . $prediction->matchId . '" and user_id="' . $prediction->userId . '"';
    $result = $prediction->selectPrediction($selectQuery);
    if (mysli_fetch-mysqli_num_rows($result)>0) {
        //echo "<script>
        //  alert('Already Predicted for Selected Match.');
//        window.location.href='prediction.php?predict_id=0&match_id=';
//        </script>";
        $_SESSION['errorMsg']="Already Predicted For selected match.";
        // echo "Already Predicted for Selected Match";
      //  $_SESSION['homeTeamScore']=$_POST['home_score'];
       // $_SESSION['awayTeamScore']=$_POST['away_score'];
        //header('Location: ' . $_SERVER['HTTP_REFERER']);
        header('location:predictions.php');
    } else {
        $insertResult = $prediction->insertPrediction();
        if ($insertResult) {
            header('Location: matches.php');
        }
    }
} else if ($predictId > 0) {
    $result = $prediction->updatePrediction();
    if ($result) {
        header("Location:predictions.php");
    }

}