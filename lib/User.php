<?php

class User
{
    private $email_id;
    private $password;
    private $first_name;
    private $last_name;

    function __construct(string $email_id, string $password, string $first_name = null, string $last_name = null)
    {
        $this->email_id = $email_id;
        $this->password = md5($password);
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    function get_username()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    function get_firstname()
    {
        return $this->first_name;
    }

    function get_lastname()
    {
        return $this->last_name;
    }

    function get_password()
    {
        return $this->password;
    }

    function get_emailid()
    {
        return $this->email_id;
    }

    function add_user(mysqli $con)
    {
        $response = array();

        $email_id = $con->real_escape_string($this->email_id);
        $password = $con->real_escape_string($this->password);
        $first_name = $con->real_escape_string($this->first_name);
        $last_name = $con->real_escape_string($this->last_name);

        if($this->first_name == null || $this->last_name == null)
        {
            $response['status'] = false;
            $response['message'] = 'first name or last name of user can\'t be empty';
            return $response;
        }

        if($this->is_existing_user($con))
        {
            $response['status'] = false;
            $response['message'] = 'Email id is already registered';
            return $response;
        }

        $sql = "INSERT INTO user(email_id, password, first_name, last_name) VALUES ('$email_id', '$password', '$first_name', '$last_name')";
        $result = $con->query($sql);

        if(!$result)
        {
            $response['status'] = false;
            $response['message'] = 'User registration failed';
            return $response;
        }
        else
        {
            $response['status'] = true;
            $response['message'] = 'User registration successful';
            return $response;
        }
    }

    function is_existing_user(mysqli $con)
    {
        $email_id = $con->real_escape_string($this->email_id);

        $sql = "SELECT email_id FROM user WHERE email_id = '$email_id'";

        $result = $con->query($sql);

        if($result->num_rows == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function authenticate(mysqli $con)
    {
        $response = array();

        $email_id = $con->real_escape_string($this->email_id);
        $password = $con->real_escape_string($this->password);

        $sql = "SELECT * FROM user WHERE email_id = '$email_id' and password = '$password'";

        $result = $con->query($sql);

        if($result->num_rows == 1)
        {
            while ($row = $result->fetch_assoc())
            {
                $this->first_name = $row['first_name'];
                $this->last_name = $row['last_name'];
            }
            $response['status'] = true;
            $response['message'] = 'Authentication successful';
            return $response;
        }
        else
        {
            $response['status'] = false;
            $response['message'] = 'Authentication failed';
            return $response;
        }
    }

    function update_profile_info(mysqli $con,string $email_id,string $up_firstname,string $up_lastname,string $oldpsw,string $newpsw)
    {
        $response = array();
        $up_firstname = $con->real_escape_string($up_firstname);
        $up_lastname = $con->real_escape_string($up_lastname);
        $oldpsw = $con->real_escape_string($oldpsw);
        $newpsw = $con->real_escape_string($newpsw);
        $email_id = $con->real_escape_string($email_id);
        $oldpsw = md5($oldpsw);
        $newpsw = md5($newpsw);
        if($newpsw == md5(''))
        {
            $newpsw = $oldpsw;
        }
        if($oldpsw != $this->password) {
            $response['status'] = false;
            $response['message'] = 'Incorrect password entered';
            return $response;
        }
        $sql = "UPDATE user SET first_name = '$up_firstname',last_name = '$up_lastname',password = '$newpsw' WHERE email_id ='$email_id'";
        $con->query($sql);
        $this->first_name = $up_firstname;
        $this->last_name = $up_lastname;
        $this->password = $newpsw;
        $response['status'] = true;
        $response['message'] = 'Profile Information Updated';
        return $response;
    }

    function delete_profile(mysqli $con,string $email_id)
    {
        $response = array();
        $email_id = $con->real_escape_string($email_id);
        $sql  = "DELETE FROM user where email_id='$email_id'";
        $con->query($sql);
        $response['status'] = true;
        $response['message'] = 'Profile Information Deleted';
        return $response;
    }
}