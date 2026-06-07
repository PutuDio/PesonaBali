<?php
namespace Core;

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "pesonabali";
    private $conn;

    public function __construct() {
        $this->conn = new \mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

// --------------------------------------------------------

namespace Main;

use Core\Database;

// Buat objek Database dan simpan koneksi di variabel global $conn
$db = new Database();
$conn = $db->getConnection();

?>
