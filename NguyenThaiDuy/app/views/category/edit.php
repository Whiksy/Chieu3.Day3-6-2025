<?php include 'app/views/shares/header.php'; ?>
<h1>Sửa danh mục</h1>

<form method="POST" action="/NguyenThaiDuy/Category/update">
    <input type="hidden" name="id" value="<?= $category->id ?>">

    <div class="form-group">
        <label for="name">Tên danh mục:</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8') ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea name="description" id="description" class="form-control" rows="3"><?= htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8') ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="/NguyenThaiDuy/Category/list" class="btn btn-secondary">Hủy</a>
</form>
<?php include 'app/views/shares/footer.php'; ?>