<?php

namespace App;

class match
{
    public $id;
    public $homeTeam;
    public $awayTeam;
    public $time;

    function setId($id)
    {
        $this->id = $id;
    }

    function getId()
    {
        return $this->id;
    }


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

    function insertMatch()
    {
        if($this->homeTeam==""||$this->awayTeam=="") {
            $query = 'INSERT INTO matches(home_team, away_team) VALUES (' . $this->homeTeam . ',' . $this->awayTeam . ')';
            $connection = mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
            $result = mysqli_query( $connection,$query);
            return $result;
        }
    }

    function updateMatch()
    {
        if($this->homeTeam==""||$this->awayTeam=="" && $this->id!=0) {
            $query = 'update matches set homeTeam='.$this->homeTeam.',awayTeam='.$this->awayTeam.' where id='.$this->id;
            $connection = mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
            $result = mysqli_query( $connection,$query);
            return $result;
        }
    }

    function deleteMatch()
    {
        if($this->id!=0)
        {
            $query = 'Delete from matches where id='.$this->id;
            $connection = mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
            $result =mysqli_query($connection,$query);
            return $result;
        }

    }

    function selectMatch($query)
    {
        $connection = mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
        $result=mysqli_query($connection,$query);
        return $result;
    }


}