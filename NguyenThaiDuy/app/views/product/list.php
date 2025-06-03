<?php include 'app/views/shares/header.php'; ?>

<div class="container my-4">
    <h1>Danh sách sản phẩm</h1>
    <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <?php if ($product->image): ?>
                <img src="/NguyenThaiDuy/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                     class="card-img-top" alt="Product Image">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/NguyenThaiDuy/Product/show/<?php echo $product->id; ?>">
                            <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </h5>
                    <p class="card-text"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p class="card-text"><strong>Giá:</strong> <?php echo number_format($product->price); ?> VND</p>
                    <p class="card-text"><strong>Danh mục:</strong> <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between gap-1">
                        <?php if (SessionHelper::isAdmin()): ?>
                            <a href="/NguyenThaiDuy/Product/edit/<?php echo $product->id; ?>" 
                               class="btn btn-warning btn-sm py-1 px-2">Sửa</a>
                            <a href="/NguyenThaiDuy/Product/delete/<?php echo $product->id; ?>" 
                               class="btn btn-danger btn-sm py-1 px-2" 
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                        <?php endif; ?>
                        <a href="/NguyenThaiDuy/Product/addToCart/<?php echo $product->id; ?>" 
                           class="btn btn-primary btn-sm py-1 px-2">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 12px rgb(40, 64, 201);
        opacity: 2;
    }

    /* Bo góc cho toàn bộ card */
    .card {
      background-color: #d0e7ff; /* màu xanh dương nhạt */
      border-radius: 15px;
      transition: background-color 0.4s ease, transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      color: #000; /* chữ màu đen */
    }

    .card:hover {
      background-color: #ffb6c1; /* màu hồng nhạt khi hover */
      transform: translateY(-8px);
      box-shadow: 0 12px 25px rgba(255, 105, 180, 0.4);
      color: #000; /* giữ chữ đen */
    }

    .card-img-top {
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      transition: transform 0.3s ease;
      
      background-color: white;    /* nền trắng quanh ảnh */
      padding: 10px;              /* khoảng trắng giữa ảnh và viền */
      box-sizing: border-box;     /* tính padding trong kích thước */
      height: 200px;              /* giữ chiều cao cố định */
      object-fit: contain;        /* giữ tỷ lệ ảnh */
      display: block;             /* fix margin, padding */
      margin: 0 auto;             /* căn giữa ảnh */
      border-radius: 15px 15px 0 0; /* bo góc trên như card */
    }

    .card:hover .card-img-top {
      transform: scale(1.05);
    }

    .card-body a {
      color: #003366; /* màu xanh đậm cho link */
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .card:hover .card-body a {
      color: #800020; /* màu đỏ đậm khi hover */
      text-decoration: underline;
    }

    /* Nút trong card footer */
    .card-footer .btn {
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .card-footer .btn:hover {
      opacity: 0.85;
      box-shadow: 0 3px 10px rgba(0,0,0,0.15);
    }
</style>
