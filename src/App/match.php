<?php

class match
{
   public $homeTeam;
    public $awayTeam;

    function setHomeTeam($homeTeam)
    {
        $this->homeTeam=$homeTeam;
    }
    function getHomeTeam()
    {
        return $this->homeTeam;

    }
}