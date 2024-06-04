<?php
include 'db.php';

class AkunPerusahaan {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($nama_perusahaan, $username, $password) {
        $sql = "INSERT INTO akun_perusahaan (nama_perusahaan, username, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $nama_perusahaan, $username, $password);
        $stmt->execute();
        $stmt->close();
    }

    public function read($id) {
        $sql = "SELECT * FROM akun_perusahaan WHERE id_perusahaan = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();
        return $data;
    }

    public function update($id, $nama_perusahaan, $username, $password) {
        $sql = "UPDATE akun_perusahaan SET nama_perusahaan = ?, username = ?, password = ? WHERE id_perusahaan = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $nama_perusahaan, $username, $password, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $sql = "DELETE FROM akun_perusahaan WHERE id_perusahaan = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
