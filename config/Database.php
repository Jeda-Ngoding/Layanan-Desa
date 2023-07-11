<?php

class Database
{

    private $hostname = "127.0.0.1";
    private $username = "root";
    private $password = "root";
    private $database = "layanan_desa";
    private $mysqli = "";
    public $sql;
    private $result = array();

    function __construct()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        date_default_timezone_set('Asia/Jakarta');
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

        $this->sql = $result = $this->mysqli->query($sql);
    }


    public function selectSuratPengajuan($where = null)
    {
        if ($where != null) {
            $sql = "SELECT sp.*, p.nama as nama_penduduk, jp.nama as nama_pengajuan FROM surat_pengajuan sp join penduduk p on p.id = sp.id_penduduk join jenis_pengajuan jp on jp.id = sp.id_jenis_pengajuan WHERE $where order by sp.created_at desc";
        } else {
            $sql = "SELECT sp.*, p.nama as nama_penduduk, jp.nama as nama_pengajuan FROM surat_pengajuan sp join penduduk p on p.id = sp.id_penduduk join jenis_pengajuan jp on jp.id = sp.id_jenis_pengajuan order by sp.created_at desc";
        }

        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}
