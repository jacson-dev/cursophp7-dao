<?php

class Sql extends PDO {

    private $conn;

    public function __construct() {

        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

    }

    private function setParams($statement, $parameters = array()) {

        foreach ($parameters as $key => $value) {

            $this->setParam($statement, $key, $value);

        }

    }

    private function setParam($statement, $key, $value){

        $statement->bindParam($key, $value);

    }

    public function query(string $query, ?int $fetchMode = null, ...$fetchModeArgs): PDOStatement|false {

        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            return false;
        }

        if ($fetchMode !== null) {
            $stmt->setFetchMode($fetchMode, ...$fetchModeArgs);
        }

        return $stmt->execute() ? $stmt : false;

    }

    public function select($rawQuery, $params = array()):array{

        $stmt = $this->query($rawQuery);

        $this->setParams($stmt, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}

?>
