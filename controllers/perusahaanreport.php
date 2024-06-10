<?php
header('Content-Type: application/json');

include '../config/db.php';

// Query untuk mendapatkan jumlah perusahaan yang membuat berita
$sql = "SELECT akun_perusahaan.id_perusahaan, akun_perusahaan.nama_perusahaan, COUNT(berita.id_berita) as jumlah_berita 
        FROM akun_perusahaan 
        JOIN berita ON akun_perusahaan.id_perusahaan = berita.id_perusahaan 
        GROUP BY akun_perusahaan.id_perusahaan";
$result = $conn->query($sql);

$data = array();
if ($result) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    exit();
}

echo json_encode($data);
$conn->close();
?>
