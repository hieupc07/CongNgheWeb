<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $stmt = $pdo->prepare("INSERT INTO products (name, price) VALUES (?, ?)");
    $stmt->execute([$name, $price]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Thêm sản phẩm</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá thành</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
        </form>
    </div>
</body>
</html>
