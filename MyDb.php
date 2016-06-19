<?php

/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 19.06.2016
 * Time: 03:54
 */
class MyDb {

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
            self::$instance = new MyDb();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null;
    }

    /**
     * @param $table
     * @param $form
     * @param null $sql
     * @param bool $bool
     * @return string
     */
    public function insertData($table, $form, $sql = null, $bool = true) {
        try {
            $set = $bool ? implode(', ', array_fill(0, count($form), '?')): $sql;
            $column = implode(",", array_keys($form));
            $stmt = $this->conn->prepare(/** @lang text */
                "INSERT INTO $table($column) VALUES($set)");
            $stmt->execute(array_values($form));
            if (!empty($this->conn)) {
                return $this->conn->lastInsertId();
            }
        }
        catch(PDOException $e) {
            $this->error = $e->getMessage();

        }
    }

    /**
     * @param $table
     * @param $form
     * @param $where
     * @return int
     */
    public function updateData($table, $form, $where) {
        try {
            $column = implode(' = ?, ',  array_keys($form)). ' =? ';
            $where2 = implode(' = ?, ',  array_keys($where)). ' =? ';
            $stmt = $this->conn->prepare(/** @lang text */
                "UPDATE $table SET $column WHERE $where2");
            $form = array_merge($form, $where);
            $stmt->execute(array_values($form));
            return $stmt->rowCount();
        }
        catch(PDOException $e) {
            $this->error = $e->getMessage();

        }
    }

    /**
     * @param $table
     * @param $where
     * @return int
     */
    public function deleteData($table, $where) {
        try {
            $where2 = implode(' = ?, ',  array_keys($where)). ' =? ';
            $stmt = $this->conn->prepare(/** @lang text */
                "DELETE FROM $table WHERE $where2");
            $stmt->execute(array_values($where));
            return $stmt->rowCount();
        }
        catch(PDOException $e) {
            $this->error = $e->getMessage();

        }
    }

    /**
     * @param $sql
     * @param array $data
     * @param bool $bool
     * @return array|int
     */
    public function getData($sql, $data=array(), $bool = true) {
        try {
            $stmt = $this->conn->prepare($sql);
            for ($i = 0; $i < count($data); $i++) {
                $stmt->bindParam($i+1, $data[$i],(is_int($data[$i])? PDO::PARAM_INT : PDO::PARAM_STR ));
            }
            $stmt->execute();
            if($bool == true) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else {
                return $stmt->rowCount();
            }
        }
        catch(PDOException $e) {
            $this->error = $e->getMessage();

        }
    }

}

$instance = MyDb::getInstance();
$conn = $instance->getConnection();
$where = array(102,103);
$conn = $instance->getData('Select * from user Where id = ? or id =  ? ', $where);
print_r($conn);