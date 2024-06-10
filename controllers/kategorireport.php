<?php   
header('Content-Type: application/json');

include '../config/db.php';
$sql = "SELECT kategori.kategori, COUNT(berita.id_kategori) as count 
        FROM kategori 
        LEFT JOIN berita ON kategori.id_kategori = berita.id_kategori 
        GROUP BY kategori.id_kategori";
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
