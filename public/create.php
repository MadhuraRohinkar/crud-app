<?php
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    if ($name && $price && $category) {
        $stmt = $pdo->prepare("INSERT INTO products (name, price, category) VALUES (?, ?, ?)");
        $stmt->execute([$name, $price, $category]);
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
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 500px;">
        <h4 class="mb-4">Add New Product</h4>

        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control form-control-lg" placeholder="Enter price" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" name="category" id="category" class="form-control form-control-lg" placeholder="Enter category" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary btn-lg">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg">Save Product</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
