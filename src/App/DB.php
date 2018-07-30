<?php
namespace App;

class DB
{
   public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

   public function query($query)
    {
        $connection =mysqli_connect('127.0.0.1','root','','worldcup');
        return ($connection->qeury($query));
    }

   public function getAll()
    {
       $connection =mysqli_connect('127.0.0.1','root','','worldcup');
       $query = 'select * from '.$this->table;
       return $connection->query($query);
    }
}
