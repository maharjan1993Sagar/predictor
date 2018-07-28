<?php


function OpenCon()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database="worldcup";
    $conn = new mysqli($servername, $username, $password, $database);
    return $conn;
}
function CloseCon($conn)
{
   $conn->close();
}
