<?php
require '../config/db.php';

// Normalize category names (remove spaces, make uppercase)
$sql = "SELECT UPPER(TRIM(category)) as category, COUNT(*) as total FROM products GROUP BY UPPER(TRIM(category))";
$stmt = $pdo->query($sql);

$labels = [];
$values = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $labels[] = $row['category'];
    $values[] = $row['total'];
}

echo json_encode([
    "labels" => $labels,
    "values" => $values
]);
