<?php require '../config/db.php';
$id = $_GET['id'];
$pdo->prepare("DELETE FROM products WHERE id=?")->execute([$id]);
header("Location: index.php");