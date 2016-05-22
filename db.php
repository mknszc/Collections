<?php

/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 22.05.2016
 * Time: 14:10
 */
/*
 * singleton example
 */
class db {
    // Hold the class instance.
    private static $instance = null;
    private $conn;
    private $error;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'deneme';

    // The db connection is established in the private constructor.
    /**
     * db constructor.
     */
    private function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};
            dbname={$this->name}", $this->user, $this->pass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        }
        catch(PDOException $e) {
            $this->error = $e->getMessage();
            die();
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new db();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
    /**
     * @param $query
     * @return array
     */
    function getData($query) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt;
        }
        catch(PDOException $e) {
            $this->error = $e->getMessage();
            die();
        }
    }
}

$instance = db::getInstance();
$conn = $instance->getConnection();
$conn = $instance->getData('INSERT INTO user (name,surname) VALUES ("name","surnme")');
echo "<table border='1px'><tr>";
foreach ($conn as $r) {
    echo '<td>'.$r['id'].'</td>';
}
echo "</tr></table>";
