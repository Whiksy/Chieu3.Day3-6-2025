<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Thêm người dùng mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
    <h2>Thêm người dùng mới</h2>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/NguyenThaiDuy/UserManagement/add" method="POST" novalidate>
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" id="username" name="username" required value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
        </div>

        <div class="mb-3">
            <label for="fullname" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required value="<?= htmlspecialchars($_POST['fullname'] ?? '') ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Vai trò</label>
            <select id="role" name="role" class="form-select">
                <option value="user" <?= (($_POST['role'] ?? '') === 'user') ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= (($_POST['role'] ?? '') === 'admin') ? 'selected' : '' ?>>Admin</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="confirmpassword" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
        </div>

        <button type="submit" class="btn btn-success">Thêm người dùng</button>
        <a href="/NguyenThaiDuy/UserManagement/list" class="btn btn-secondary">Hủy</a>
    </form>
</div>
</body>
</html>
