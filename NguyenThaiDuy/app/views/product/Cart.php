<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <h1 class="mb-4 text-center">🛒 Giỏ hàng của bạn</h1>

    <?php if (!empty($cart)): ?>
    <div class="row">
        <div class="col-lg-8">
            <ul class="list-group mb-4">
                <?php 
                $total = 0;
                foreach ($cart as $id => $item): 
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>
                <li class="list-group-item d-flex flex-column flex-md-row align-items-md-center gap-3">
                    <div>
                        <?php if ($item['image']): ?>
                        <img src="/NguyenThaiDuy/<?php echo $item['image']; ?>" alt="Ảnh sản phẩm" class="img-thumbnail" style="width: 100px;">
                        <?php else: ?>
                        <div class="bg-secondary text-white d-flex justify-content-center align-items-center" style="width: 100px; height: 100px;">
                            Không có ảnh
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="flex-grow-1">
                        <h5 class="mb-1"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h5>
                        <p class="mb-1">Giá: <strong><?php echo number_format($item['price'], 0, ',', '.'); ?> VND</strong></p>
                        <div class="d-flex align-items-center mb-1">
                            <span class="me-2">Số lượng:</span>
                            <a href="/NguyenThaiDuy/Product/decrease/<?php echo $id; ?>" class="btn btn-sm btn-outline-dark">-</a>
                            <span class="mx-2"><?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <a href="/NguyenThaiDuy/Product/increase/<?php echo $id; ?>" class="btn btn-sm btn-outline-dark">+</a>
                        </div>
                        <p>Thành tiền: <strong><?php echo number_format($subtotal, 0, ',', '.'); ?> VND</strong></p>
                    </div>

                    <div>
                        <a href="/NguyenThaiDuy/Product/remove/<?php echo $id; ?>" class="btn btn-sm btn-outline-danger">🗑️ Xóa</a>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="col-lg-4">
            <div class="bg-light p-4 rounded shadow-sm mb-3">
                <h4 class="mb-3">🧾 Tóm tắt đơn hàng</h4>
                <p class="fs-5">Tổng cộng: <strong class="text-danger"><?php echo number_format($total, 0, ',', '.'); ?> VND</strong></p>
                <a href="/NguyenThaiDuy/Product/checkout" class="btn btn-success w-100 mb-2">✅ Thanh Toán</a>
                <a href="/NguyenThaiDuy/Product" class="btn btn-outline-primary w-100">⬅️ Tiếp tục mua sắm</a>
            </div>
        </div>
    </div>

    <?php else: ?>
    <div class="alert alert-info text-center">
        🛍️ Giỏ hàng của bạn đang trống. <br>
        <a href="/NguyenThaiDuy/Product" class="btn btn-primary mt-3">Bắt đầu mua sắm</a>
    </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>
