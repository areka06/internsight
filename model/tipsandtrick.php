<?php
include '../../config/db.php';

class Informasi {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($video, $judul_informasi, $deskripsi_informasi) {
        $sql = "INSERT INTO informasi (video, judul_informasi, deskripsi_informasi) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $video, $judul_informasi, $deskripsi_informasi);
        $stmt->execute();
        $stmt->close();
    }

    public function read($id) {
        $sql = "SELECT * FROM informasi WHERE id_informasi = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();
        return $data;
    }

    public function update($id, $video, $judul_informasi, $deskripsi_informasi) {
        $sql = "UPDATE informasi SET video = ?, judul_informasi = ?, deskripsi_informasi = ? WHERE id_informasi = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $video, $judul_informasi, $deskripsi_informasi, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $sql = "DELETE FROM informasi WHERE id_informasi = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
