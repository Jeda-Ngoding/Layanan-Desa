<?php

class Database
{

    private $hostname = "localhost";
    private $username = "root";
    private $password = "password";
    private $database = "layanan_desa";
    private $mysqli = "";
    public $sql;
    private $result = array();

    function __construct()
    {
        $this->mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->database);
    }

    public function insert($table, $data = array())
    {
        $table_columns = implode(',', array_keys($data));
        $table_value = implode("','", $data);

        $sql = "INSERT INTO $table($table_columns) VALUES('$table_value')";

        $this->result = $this->mysqli->query($sql);
    }

    public function update($table, $data = array(), $id)
    {
        $args = array();

        foreach ($data as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE  $table SET " . implode(',', $args);

        $sql .= " WHERE $id";

        $result = $this->mysqli->query($sql);
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table";
        $sql .= " WHERE $id ";
        $sql;
        $result = $this->mysqli->query($sql);
    }

    public function select($table, $rows = "*", $where = null)
    {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        $result = $this->mysqli->query($sql);
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}
