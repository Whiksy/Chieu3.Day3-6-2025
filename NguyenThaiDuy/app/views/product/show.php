<?php include 'app/views/shares/header.php'; ?>

<!-- Bootstrap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container my-5">
  <?php if (isset($product) && is_object($product)): ?>
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
      <div class="row g-0 align-items-center">
        
        <!-- Product Image -->
        <div class="col-md-6 bg-light d-flex justify-content-center align-items-center p-4">
          <?php if (!empty($product->image)): ?>
            <img src="/NguyenThaiDuy/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                 alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" 
                 class="img-fluid rounded-4 shadow" style="max-height: 400px; object-fit: contain;">
          <?php else: ?>
            <div class="d-flex flex-column justify-content-center align-items-center text-muted" style="height: 400px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="currentColor" class="bi bi-image mb-3" viewBox="0 0 16 16">
                <path d="M14.002 3a1 1 0 0 1 1 1v8.002a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zm0-1H2a2 2 0 0 0-2 2v8.002a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"/>
                <path d="M10.648 9.646a.5.5 0 0 0-.702.07L7.5 12.293 5.354 10.146a.5.5 0 1 0-.708.708l2.5 2.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.206-.708z"/>
                <path d="M4.502 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0z"/>
              </svg>
              <p class="fs-5">Chưa có hình ảnh</p>
            </div>
          <?php endif; ?>
        </div>

        <!-- Product Info -->
        <div class="col-md-6 p-5">
          <h1 class="display-5 fw-bold text-primary mb-3">
            <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
          </h1>
          <div class="mb-3">
            <!-- Fake Rating -->
            <div class="text-warning mb-2" style="font-size: 1.25rem;">
              &#9733; &#9733; &#9733; &#9733; <span class="text-muted">&#9733;</span>
              <small class="text-muted ms-2">(4.0/5)</small>
            </div>
            <p class="text-secondary fs-5 lh-lg">
              <?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?>
            </p>
          </div>

          <h3 class="text-danger fw-bold mb-4">
            <?php echo number_format($product->price ?? 0, 0, ',', '.'); ?> VND
          </h3>

          <div class="mb-4">
            <span class="badge bg-info text-dark fs-6 px-3 py-2 shadow-sm">
              <?php echo isset($product->category_name) && $product->category_name ? 
                htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Chưa có danh mục'; ?>
            </span>
          </div>

          <div class="d-flex flex-wrap gap-3">
            <a href="/NguyenThaiDuy/Product/addToCart/<?php echo $product->id; ?>" 
               class="btn btn-success btn-lg d-flex align-items-center shadow-sm"
               style="min-width: 220px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-plus me-2" viewBox="0 0 16 16">
                <path d="M8 7a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
                <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .485.379L2.89 5H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 14H4a.5.5 0 0 1-.491-.408L1.01 2H.5a.5.5 0 0 1-.5-.5zM3.14 6l1.25 6h7.22l1.25-6H3.14z"/>
              </svg>
              Thêm vào giỏ hàng
            </a>

            <a href="/NguyenThaiDuy/Product" 
               class="btn btn-outline-secondary btn-lg d-flex align-items-center shadow-sm"
               style="min-width: 220px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H3.707l3.147 3.146a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L3.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
              </svg>
              Quay lại danh sách
            </a>
          </div>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="alert alert-danger text-center fs-4 rounded-4 shadow-lg" role="alert">
      Không tìm thấy sản phẩm! Vui lòng thử lại hoặc quay lại danh sách sản phẩm.
    </div>
  <?php endif; ?>
</div>

<!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'app/views/shares/footer.php'; ?>
