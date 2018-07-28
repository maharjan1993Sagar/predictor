<?php

require_once '../vendor/autoload.php';
$match = new App\match();
$match->setHomeTeam($_POST['home_team']);
$match->getAwayTeam($_POST['away_team']);

$query = 'Select * from matches where home_team=' . $homeTeam . ' && away_team=' . $awayTeam;
if ($match->selectMatch($qeury)) {
    header("location:createMatch.php");
} else {
    $match->insertMatch();
    if ($match->insertMatch()) {
        header("location:matches.php");
        } else {
        header("location:createMatch.php");
    }
}