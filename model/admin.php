<?php
include 'db.php';

class AkunAdmin {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($username, $password) {
        $sql = "INSERT INTO akun_admin (username, password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->close();
    }

    public function read($id) {
        $sql = "SELECT * FROM akun_admin WHERE id_admin = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();
        return $data;
    }

    public function update($id, $username, $password) {
        $sql = "UPDATE akun_admin SET username = ?, password = ? WHERE id_admin = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $username, $password, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $sql = "DELETE FROM akun_admin WHERE id_admin = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
