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
}