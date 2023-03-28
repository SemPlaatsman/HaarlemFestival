<?php
require_once __DIR__ . '/../config/dbconfig.php';

class Repository
{

    protected $connection;

    function __construct()
    {

        try {
            $dbconfig = new dbconfig();
            $this->connection = new PDO("mysql:host=$dbconfig->servername;dbname=$dbconfig->database", $dbconfig->username, $dbconfig->password);

            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

?>