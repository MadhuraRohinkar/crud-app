<?php
require '../config/db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Fetch existing product data
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    header("Location: index.php");
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    if ($name && $price && $category) {
        $stmt = $pdo->prepare("UPDATE products SET name = ?, price = ?, category = ? WHERE id = ?");
        $stmt->execute([$name, $price, $category, $id]);
        header("Location: index.php");
        exit;
    } else {
        $error = "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 500px;">
        <h4 class="mb-4">Edit Product</h4>

        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-lg" value="<?= htmlspecialchars($product['name']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control form-control-lg" value="<?= htmlspecialchars($product['price']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" name="category" id="category" class="form-control form-control-lg" value="<?= htmlspecialchars($product['category']) ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary btn-lg">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg">Update Product</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
