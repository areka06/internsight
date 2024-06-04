<?php
include 'db.php';

class AkunPelamar {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($nama_pelamar, $username, $password) {
        $sql = "INSERT INTO akun_pelamar (nama_pelamar, username, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $nama_pelamar, $username, $password);
        $stmt->execute();
        $stmt->close();
    }

    public function read($id) {
        $sql = "SELECT * FROM akun_pelamar WHERE id_pelamar = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();
        return $data;
    }

    public function update($id, $nama_pelamar, $username, $password) {
        $sql = "UPDATE akun_pelamar SET nama_pelamar = ?, username = ?, password = ? WHERE id_pelamar = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $nama_pelamar, $username, $password, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $sql = "DELETE FROM akun_pelamar WHERE id_pelamar = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
