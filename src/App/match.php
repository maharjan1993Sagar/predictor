<?php

namespace App;

class match extends DB
{
    public $id;
    public $homeTeam;
    public $awayTeam;
    public $time;
    public $table = 'matches';
    function setHomeTeam($homeTeam)
    {
        $this->homeTeam = $homeTeam;
    }

    function getHomeTeam()
    {
        return $this->homeTeam;
    }

    function setAwayTeam($awayTeam)
    {
        $this->awayTeam = $awayTeam;
    }

    function getAwayTeam()
    {
        return $this->awayTeam;
    }
    function setTime($time)
    {
        $this->time = $time;
    }

    function getTime()
    {
        return $this->time;
    }
    function insertMatch()
    {
        if ($this->homeTeam == "" || $this->awayTeam == "") {
            $query = 'INSERT INTO matches(home_team, away_team) VALUES (' . $this->homeTeam . ',' . $this->awayTeam . ')';
           // $connection = mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
          //  $result = mysqli_query($connection, $query);
            return query($query);
        }
    }

    function updateMatch()
    {
        if ($this->homeTeam == "" || $this->awayTeam == "" && $this->id != 0) {
            $query = 'update matches set homeTeam=' . $this->homeTeam . ',awayTeam=' . $this->awayTeam . ' where id=' . $this->id;
           // $connection = mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
           // $result = mysqli_query($connection, $query);
            return query($query);
        }
    }

    function deleteMatch()
    {
        if ($this->id != 0) {
            $query = 'Delete from matches where id=' . $this->id;
            return query($query);

        }

    }

    function selectMatch($query)
    {
        return query($query);
    }

    function getAll()
    {
        $result = parent:: getAll();
        $matches = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $thisMatch = new match();
            $thisMatch->setHomeTeam($row['home_team']);
            $thisMatch->setAwayTeam($row['away_team']);
            $thisMatch->setId($row['id']);
            $thisMatch->setTime($row['time']);
            $matches[] = $thisMatch;
        }
        return $matches;
    }

}