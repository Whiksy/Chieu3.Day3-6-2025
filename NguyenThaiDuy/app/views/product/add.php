<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <h1 class="mb-4 text-center">Thêm sản phẩm mới</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="/NguyenThaiDuy/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên sản phẩm" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả <span class="text-danger">*</span></label>
            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Nhập mô tả sản phẩm" required></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá <span class="text-danger">*</span></label>
            <input type="number" id="price" name="price" class="form-control" placeholder="Nhập giá sản phẩm" step="0.01" min="0" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Danh mục <span class="text-danger">*</span></label>
            <select id="category_id" name="category_id" class="form-select" required>
                <option value="" disabled selected>Chọn danh mục</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>">
                        <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="form-label">Hình ảnh</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
        </div>

        <div class="d-flex justify-content-between">
            <a href="/NguyenThaiDuy/Product" class="btn btn-outline-secondary">Quay lại danh sách sản phẩm</a>
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </div>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>
