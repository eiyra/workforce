<?php
class dbConfig
{
    protected $host;
    protected $username;
    protected $password;
    protected $dbName;
    private $dbConnect = null;
    public function __construct()
    {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = "";
        $this->dbName = "workforce";

        $this->dbConnect = mysqli_connect($this->host, $this->username, $this->password, $this->dbName);

        if (!$this->dbConnect) {
            die("Failed to connect to MySQL: " . mysqli_connect_error());
        }
    }
}
?>