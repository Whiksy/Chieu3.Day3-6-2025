<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <h1 class="mb-4 text-center fw-bold">Danh sách danh mục</h1>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="/NguyenThaiDuy/Category/add" class="btn btn-success btn-lg shadow-sm d-flex align-items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
              <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zM8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0z"/>
            </svg>
            Thêm category
        </a>
        <a href="/NguyenThaiDuy/Product" class="btn btn-outline-secondary btn-lg shadow-sm">Quay lại danh sách sản phẩm</a>
    </div>

    <div class="table-responsive shadow rounded" style="overflow-x:auto;">
        <table class="table align-middle table-hover" style="min-width: 700px;">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col" class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $cat): ?>
                <tr class="align-middle" style="transition: background-color 0.3s ease;">
                    <td class="text-center fw-semibold"><?= $cat->id ?></td>
                    <td class="fw-semibold"><?= htmlspecialchars($cat->name, ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="text-truncate" style="max-width: 400px;" title="<?= htmlspecialchars($cat->description, ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars($cat->description, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <td class="text-center">
                        <a href="/NguyenThaiDuy/Category/edit/<?= $cat->id ?>" class="btn btn-sm btn-warning me-2 shadow-sm" 
                           data-bs-toggle="tooltip" data-bs-placement="top" title="Sửa danh mục">
                            <i class="bi bi-pencil-fill"></i> Sửa
                        </a>
                        <a href="/NguyenThaiDuy/Category/delete/<?= $cat->id ?>" 
                           class="btn btn-sm btn-danger shadow-sm" 
                           onclick="return confirm('Bạn có chắc muốn xóa?')" 
                           data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa danh mục">
                            <i class="bi bi-trash-fill"></i> Xóa
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($categories)): ?>
                <tr>
                    <td colspan="4" class="text-center py-4 text-muted fst-italic">Không có danh mục nào.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Bật tooltip Bootstrap 5 cho các nút
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>
