<?php

class Database
{
    private $host;
    private $db;
    private $username;
    private $password;
    private $conn;

    /*
     * Constructor for Database class
     * @param array $config Configuration array containing server details
     */
    function __construct(array $config)
    {
        $this->host = $config['host'];
        $this->db = $config['db'];
        $this->username = $config['username'];
        $this->password = $config['password'];
    }

    /*
     * @return mysqli|null Returns mysqli object or null if no connection to database
     */
    function get_connection()
    {
        return $this->conn;
    }

    /*
     * Creates a mysqli connection object
     * @return boolean Returns true if connection is successful else returns false
     */
    function connect()
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->db);

        if($conn->connect_error)
        {
            return false;
        }

        $this->conn = $conn;

        return true;
    }
}
