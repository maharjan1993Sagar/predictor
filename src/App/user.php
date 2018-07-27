<?php


namespace App;

include('../connection.php');

class user
{
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $confirmPassword;
    public $permission;

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword= $confirmPassword;
    }

    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }
    public function setPermission($permission)
    {
        $this->permission= $permission;
    }

    public function getPermission()
    {
        return $this->permission;
    }
    public function register()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database="worldcup";
        $conn = new mysqli($servername, $username, $password, $database);

        if ($this->password != $this->confirmPassword) {
            $errMsg = "Password and Confirm Password not matched.";
            // echo "Failed";
            header('Location: ../register.php');
        }
        $select_query = 'select  id from users where email="' . $this->email . '"';
        $row = mysqli_query($conn, $select_query);

        if (mysqli_num_rows($row)>0) {
            //$errMsg = "Record already contains this email.Use different email.";
            header('Location: ../register.php');
        } else {
            $encodePassword =password_hash($this->password,PASSWORD_BCRYPT_DEFAULT_COST);
            $query = 'insert into users (firstName, lastName, email,password,permission) VALUES( "' . $this->firstName . '","' . $this->lastName . '","' . $this->email . '", "' . $encodePassword . '","' . $this->permission . '" )';
            $result = mysqli_query($conn, $query);
            $_SESSION["email"]=$this->email;

            header('Location: ../home.php');
        }
    }
}
?>