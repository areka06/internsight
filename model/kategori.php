<?php
include 'db.php';
class Kategori {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($kategori) {
        $sql = "INSERT INTO kategori (kategori) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $kategori);
        $stmt->execute();
        $stmt->close();
    }

    public function read($id) {
        $sql = "SELECT * FROM kategori WHERE id_kategori = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();
        return $data;
    }

    public function update($id, $kategori) {
        $sql = "UPDATE kategori SET kategori = ? WHERE id_kategori = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $kategori, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $sql = "DELETE FROM kategori WHERE id_kategori = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>