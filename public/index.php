<?php require '../config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Product Management</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border-radius: 10px;
    }
    .table th {
      background-color: #f1f3f5;
    }
  </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-primary mb-4">
  <div class="container">
    <span class="navbar-brand fw-semibold">Product Management Dashboard</span>
  </div>
</nav>

<div class="container">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Products</h4>
    <a href="create.php" class="btn btn-success">+ Add Product</a>
  </div>

  <!-- Table Card -->
  <div class="card shadow-sm mb-5">
    <div class="card-body">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th width="160">Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
        $stmt = $pdo->query("SELECT * FROM products");
        while ($row = $stmt->fetch()) {
          echo "<tr>
            <td>{$row['name']}</td>
            <td>₹ {$row['price']}</td>
            <td><span class='badge bg-secondary'>{$row['category']}</span></td>
            <td>
              <a href='update.php?id={$row['id']}' class='btn btn-sm btn-outline-primary'>Edit</a>
              <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-outline-danger'>Delete</a>
            </td>
          </tr>";
        }
        ?>

        </tbody>
      </table>
    </div>
  </div>

  <!-- Chart Section -->
  <div class="card shadow-sm">
    <div class="card-body">
      <h5 class="mb-3">Products by Category</h5>
      <canvas id="categoryChart" height="50"></canvas>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="assets/chart.js"></script>

</body>
</html>
