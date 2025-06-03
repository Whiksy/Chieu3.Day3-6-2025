<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Quản lý người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .avatar-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h2>Danh sách người dùng</h2>

    <a href="/NguyenThaiDuy/UserManagement/add" class="btn btn-primary mb-3">Thêm người dùng mới</a>

    <table class="table table-bordered table-striped align-middle text-center">
        <thead>
            <tr>
                <th>Username</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                <tr>                    
                    <td><?= htmlspecialchars($user->username) ?></td>
                    <td><?= htmlspecialchars($user->fullname ?? '') ?></td>
                    <td><?= htmlspecialchars($user->email) ?></td>
                    <td><?= htmlspecialchars($user->role) ?></td>
                    <td>
                        <a href="/NguyenThaiDuy/UserManagement/edit/<?= urlencode($user->username) ?>" class="btn btn-sm btn-warning">Sửa</a>
                        <a href="/NguyenThaiDuy/UserManagement/delete/<?= urlencode($user->username) ?>" 
                           onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?');" 
                           class="btn btn-sm btn-danger">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6" class="text-center">Không có người dùng nào</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="/NguyenThaiDuy/product" class="btn btn-secondary mt-3">Quay lại</a>
</div>
</body>
</html>
