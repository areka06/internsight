<?php
include 'db.php';

class Berita {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($judul_berita, $gambar_berita, $tanggal_awal, $tanggal_akhir, $nama_internship, $deskripsi_berita, $id_kategori, $id_perusahaan) {
        $sql = "INSERT INTO berita (judul_berita, gambar_berita, tanggal_awal, tanggal_akhir, nama_internship, deskripsi_berita, id_kategori, id_perusahaan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssii", $judul_berita, $gambar_berita, $tanggal_awal, $tanggal_akhir, $nama_internship, $deskripsi_berita, $id_kategori, $id_perusahaan);
        $stmt->execute();
        $stmt->close();
    }

    public function read($id) {
        $sql = "SELECT * FROM berita WHERE id_berita = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();
        return $data;
    }

    public function update($id, $judul_berita, $gambar_berita, $tanggal_awal, $tanggal_akhir, $nama_internship, $deskripsi_berita, $id_kategori, $id_perusahaan) {
        $sql = "UPDATE berita SET judul_berita = ?, gambar_berita = ?, tanggal_awal = ?, tanggal_akhir = ?, nama_internship = ?, deskripsi_berita = ?, id_kategori = ?, id_perusahaan = ? WHERE id_berita = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssiii", $judul_berita, $gambar_berita, $tanggal_awal, $tanggal_akhir, $nama_internship, $deskripsi_berita, $id_kategori, $id_perusahaan, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $sql = "DELETE FROM berita WHERE id_berita = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
