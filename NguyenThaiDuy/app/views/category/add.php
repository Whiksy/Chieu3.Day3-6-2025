<?php include 'app/views/shares/header.php'; ?>
<h1>Thêm danh mục</h1>

<form method="POST" action="/NguyenThaiDuy/Category/save">
    <div class="form-group">
        <label for="name">Tên danh mục:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Thêm</button>
    <a href="/NguyenThaiDuy/Category/list" class="btn btn-secondary">Quay lại</a>
</form>
<?php include 'app/views/shares/footer.php'; ?>