<?php

namespace App;

class prediction
{
    public $id;
    public $matchId;
    public $userId;
    public $homeTeamScore;
    public $awayTeamScore;

    function setId($id)
    {
        $this->id = $id;
    }

    function getId()
    {
        return $this->id;
    }

    function setMatchId($matchId)
    {
        $this->matchId = $matchId;
    }

    function getMatchId()
    {
        return $this->matchId;
    }

    function setUserId($userId)
    {
        $this->userId = $userId;
    }

    function getUserId()
    {
        return $this->userId;
    }

    function setHomeTeamScore($homeTeamScore)
    {
        $this->homeTeamScore = $homeTeamScore;
    }

    function getHomeTeamScore()
    {
        return $this->homeTeamScore;
    }

    function setAwayTeamScore($awayTeamScore)
    {
        $this->awayTeamScore = $awayTeamScore;
    }

    function getAwayTeamScore()
    {
        return $this->awayTeamScore;
    }

    function insertPrediction()
    {
        $query='insert into predictions (match_id,user_id,home_team_score,away_team_score) values ('.$this->matchId.','.$this->userId.','.$this->homeTeamScore.','.$this->awayTeamScore.')';
        $connection = mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
        $result=$connection->query($query);
            return $result;
    }
    function updatePrediction()
    {
        $query='update predictions set match_id='.$this->matchId.' ,user_id='.$this->userId.' ,home_team_score='. $this->homeTeamScore.' ,away_team_score='.$this->awayTeamScore.' where id='.$this->id;
        $connection = mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
        $result=$connection->query($query);
            return $result;
    }
    function deletePrediction()
    {
        $query='Delete predictions where id='.$this->id;
        $connection= mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
        $result = $connection->query($query);
      return $result;
    }
    function selectPrediction($query)
    {
        $connection= mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
        $result=$connection->query($query);
        return $result;
    }
}