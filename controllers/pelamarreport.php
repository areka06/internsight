<?php
header('Content-Type: application/json');

include '../config/db.php';
$sql = "SELECT id_pelamar, COUNT(*) as count FROM akun_pelamar GROUP BY id_pelamar";
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
