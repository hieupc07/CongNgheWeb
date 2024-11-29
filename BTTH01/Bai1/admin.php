<?php        // Phạm Trung Hiếu
$flowers = [
    ["name" => "Hoa Đỗ Quyên", "image" => "./image/doquyen.jpg"],
    ["name" => "Hoa Hải Đường", "image" => "./image/haiduong.jpg"],
    ["name" => "Hoa Mai", "image" => "./image/mai.jpg"],
    ["name" => "Hoa Tường Vy", "image" => "./image/tuongvy.jpg"]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-flower'])) {
    $newFlower = [
        "name" => $_POST['name'],
        "image" => "./image/" . $_FILES['image']['name']
    ];
    move_uploaded_file($_FILES['image']['tmp_name'], $newFlower['image']);
    $flowers[] = $newFlower; 
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    $deleteIndex = $_GET['delete'];
    if (isset($flowers[$deleteIndex])) {
        unset($flowers[$deleteIndex]); 
        $flowers = array_values($flowers);
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị Danh Sách Hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-4">Quản Lí Danh Sách Hoa</h1>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Tên Hoa</th>
                    <th>Hình Ảnh</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flowers as $index => $flower): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $flower['name'] ?></td>
                        <td><img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>" style="max-width: 100px;"></td>
                        <td>
                            <a href="?delete=<?= $index ?>" class="btn btn-danger btn-sm">Xóa</a>
                            <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3 class="mt-5">Thêm Hoa Mới</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Tên Hoa</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" name="add-flower" class="btn btn-primary">Thêm Hoa</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
