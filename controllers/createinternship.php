
<?php
include '../../config/db.php';

function getCategories($conn) {
    $sql = "SELECT id_kategori, kategori FROM kategori"; // Adjust the column names if necessary
    $result = $conn->query($sql);

    if (!$result) {
        die('Query Error: ' . $conn->error);
    }

    $categories = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
    }
    return $categories;
}
?>
