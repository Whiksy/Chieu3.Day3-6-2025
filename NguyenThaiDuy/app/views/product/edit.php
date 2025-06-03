<?php include 'app/views/shares/header.php'; ?>
<h1>Sửa sản phẩm</h1>
<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
<ul>
<?php foreach ($errors as $error): ?>
<li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>
<form method="POST" action="/NguyenThaiDuy/Product/update" enctype="multipart/form-data"
onsubmit="return validateForm();">
<input type="hidden" name="id" value="<?php echo $product->id; ?>">
<div class="form-group">
<label for="name">Tên sản phẩm:</label>
<input type="text" id="name" name="name" class="form-control" value="<?php
echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
</div>
<div class="form-group">
<label for="description">Mô tả:</label>
<textarea id="description" name="description" class="form-control"
required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8');
?></textarea>
</div>
<div class="form-group">
<label for="price">Giá:</label>
<input type="number" id="price" name="price" class="form-control" step="0.01"
value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>"
required>
</div>
<div class="form-group">
<label for="category_id">Danh mục:</label>
<select id="category_id" name="category_id" class="form-control" required>
<?php foreach ($categories as $category): ?>
<option value="<?php echo $category->id; ?>" <?php echo $category->id
== $product->category_id ? 'selected' : ''; ?>>
<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8');
?>
</option>
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label for="image">Hình ảnh:</label>
<input type="file" id="image" name="image" class="form-control">
<input type="hidden" name="existing_image" value="<?php echo $product->image;
?>">
<!-- Luôn hiển thị ảnh hiện tại -->
<?php if (!empty($product->image)): ?>
        <div style="margin-top: 10px;">
            <img src="/NguyenThaiDuy/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                 alt="Ảnh sản phẩm hiện tại" 
                 style="max-width: 150px; max-height: 150px; object-fit: contain; border: 1px solid #ddd; padding: 5px; border-radius: 8px;">
        </div>
    <?php else: ?>
        <p>Chưa có ảnh sản phẩm.</p>
    <?php endif; ?>
</div>
<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>
<a href="/NguyenThaiDuy/Product" class="btn btn-secondary mt-2">Quay lại danh sách
sản phẩm</a>
<?php include 'app/views/shares/footer.php'; ?>