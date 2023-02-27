<?php
class Database{
    private $connection;
    private static $instance = null;

    private function __construct(){
        $hostname = "";
        $username = "";
        $password = "";
        $database = "";
        $this->connection = mysqli_connect($hostname, $username, $password, $database);
    }

    public static function getInstance(): Database
    {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->connection;
    }
    private function __clone(){}

}

?>
