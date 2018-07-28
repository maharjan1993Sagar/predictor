<?php


namespace App;

class user
{
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $confirmPassword;
    public $permission;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

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
        $this->confirmPassword = $confirmPassword;
    }

    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    public function setPermission($permission)
    {
        $this->permission = $permission;
    }

    public function getPermission()
    {
        return $this->permission;
    }

    function isValid()
    {
        $query = 'select * from users where email=' . $this->email;
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
        if ($conn->query($conn)) {
            return 'Email Already Exists in Record.';
        } else if ($this->password != $this->confirmPassword) {
            return 'Password and Confirm Password do not matched.';
        } else {
            return 'True';
        }

    }

    function insertUser()
    {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
        if ($this->password != $this->confirmPassword) {
            $errMsg = "Password and Confirm Password not matched.";
            header('Location: ../register.php');
        }
        $query = 'select  id from users where email="' . $this->email . '"';
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            //$errMsg = "Record already contains this email.Use different email.";
            header('Location: ../register.php');
        } else {
            $encodePassword = password_hash($this->password, PASSWORD_BCRYPT);
            $query = 'insert into users (firstName, lastName, email,password,permission) VALUES( ' . $this->firstName . ',' . $this->lastName . ',' . $this->email . ',' . $encodePassword . ',' . $this->permission . ')';
            $result = mysqli_query($conn, $query);
            header('Location: ../home.php');
        }
    }

    function updateUser()
    {


    }

    function deleteUser()
    {


    }

    function changePassword()
    {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
        $selectQuery = 'select * from users where id=' . $this->id;
        $result = mysqli_query($conn, $selectQuery);
        if ($result) {
            $row = $result->fetch_assoc();
            $encodePassword = password_hash($this->password, PASSWORD_BCRYPT);
            $updateQuery = 'update users set first_name=' . $row['first_name'] . ' ,last_name=' . $row['last_name'] . ' ,password=' . $encodePassword . ' ,permission=' . $row['permission'] . ' where id=' . $this->id;
            return mysqli_query($conn, $updateQuery);
        }

    }

    function loginUser()
    {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
        $selectQuery = 'select * from users where email="' . $this->email . '"';
        $result = mysqli_query($conn, $selectQuery);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($this->password, $row['password'])) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                // return $result;
                //header('Location: ../home.php');
                return true;
            } else {
                //  header('Location: ../login.php');
                return false;
            }

        }
    }

    function selectUser($query)
    {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'worldcup');
        $result = mysqli_query($conn, $query);
        return $result;
    }


}
