<?php
require_once "connection.php";

function insertUser($firstName,$lastName,$email,$password,$permission)
{
    $encodePassword = password_hash($password,PASSWORD_BCRYPT);
    $conn = OpenCon();
    $query = $conn->prepare("INSERT INTO users(first_name, last_name, email,password, permission) VALUES (?,?,?,?,?)");
    $query->bind_param(ssssi, $firstName,$lastName,$email,$encodePassword,$permission);

    if($query->execute())
    {
        CloseCon($conn);
        return true;
    }
    else
    {
        return $conn->error;
    }

}

function updateUser($firstName,$lastName,$email,$password,$permission,$id)
{
    $encodePassword = password_hash($password,PASSWORD_BCRYPT);
    $conn = OpenCon();
    $query = $conn->prepare("UPDATE  users set first_name = ? ,last_name=?, email=?,password=?,permission=? WHERE id = ?");
    $query->bind_param(ssssii, $firstName,$lastName,$email,$encodePassword,$permission,$id);

    if($query->execute())
    {
        CloseCon($conn);
        return true;
    }
    else
    {
        return $conn->error;
    }
}


function deleteUser($id)
{
    $conn = OpenCon();
    $query = $conn->prepare("DELETE FROM users WHERE id = ?");
    $query->bind_param(i,$id);
    //var_dump($query);


    if($query->execute())
    {
        CloseCon($conn);
        return true;
    }
    else
    {
        return $conn->error;
    }
}

function selectData($sql)
{
    $conn = OpenCon();

    $result = $conn->query($sql);
    if($result)
    {
        if($result->num_rows> 0)
        {
            return $result;
        }
        else
        {
            return "zero";
        }
    }
    else
    {
        return $conn->error;
    }
}

function insertMatch($homeTeam,$awayTeam)
{
    $conn = OpenCon();
    $query = $conn->prepare("INSERT INTO matches(home_team, away_team) VALUES (?,?)");
    $query->bind_param(ss, $homeTeam,$awayTeam);

    if($query->execute())
    {
        CloseCon($conn);
        return true;
    }
    else
    {
        return $conn->error;
    }

}
function insertPrediction($homeTeamScore,$awayTeamScore,$matchId,$userId)
{
    $conn = OpenCon();
    $query = $conn->prepare("INSERT INTO predictions(home_team_score, away_team_score,match_id,user_id) VALUES (?,?,?,?)");
    $query->bind_param(iiii, $homeTeamScore,$awayTeamScore,$matchId,$userId);

    if($query->execute())
    {
        CloseCon($conn);
        return true;
    }
    else
    {
        return $conn->error;
    }

}


function updatePrediction($homeTeamScore,$awayTeamScore,$matchId,$userId,$id)
{
    $conn = OpenCon();
    $query = $conn->prepare("UPDATE  predictions set home_team_score = ? ,away_team_score=? WHERE id = ?");
    $query->bind_param(iii, $homeTeamScore,$awayTeamScore,$id);

    if($query->execute())
    {
        CloseCon($conn);
        return true;
    }
    else
    {
        return $conn->error;
    }
}





