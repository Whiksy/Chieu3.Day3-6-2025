<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Chỉnh sửa người dùng: <?= htmlspecialchars($user->username) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        #preview-img {
            max-width: 150px;
            max-height: 150px;
            display: block;
            margin-top: 10px;
            border-radius: 8px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h2>Chỉnh sửa người dùng: <?= htmlspecialchars($user->username) ?></h2>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/NguyenThaiDuy/UserManagement/edit/<?= urlencode($user->username) ?>" method="POST" novalidate>
        <div class="mb-3">
            <label for="fullname" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required value="<?= htmlspecialchars($_POST['fullname'] ?? $user->fullname) ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? $user->email) ?>">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($_POST['phone'] ?? $user->phone) ?>">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Vai trò</label>
            <select id="role" name="role" class="form-select">
                <option value="user" <?= (($_POST['role'] ?? $user->role) === 'user') ? 'selected' : '' ?>>User</option>

            </select>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu mới (để trống nếu không đổi)</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>

        <div class="mb-3">
            <label for="avatar" class="form-label">URL ảnh đại diện</label>
            <input type="url" class="form-control" id="avatar" name="avatar" value="<?= htmlspecialchars($_POST['avatar'] ?? $user->avatar) ?>">
            <?php if (!empty($user->avatar)): ?>
                <img id="preview-img" src="<?= htmlspecialchars($user->avatar) ?>" alt="Preview Avatar">
            <?php else: ?>
                <img id="preview-img" style="display:none;" alt="Preview Avatar">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        <a href="/NguyenThaiDuy/UserManagement/list" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<script>
    // Preview ảnh đại diện khi thay đổi URL
    document.getElementById('avatar').addEventListener('input', function() {
        const preview = document.getElementById('preview-img');
        const url = this.value.trim();
        if (url) {
            preview.src = url;
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    });
</script>
</body>
</html>
