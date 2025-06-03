<?php 
// Thêm dòng này để bao gồm class SessionHelper
require_once 'C:/laragon/www/NguyenThaiDuy/app/helpers/SessionHelper.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Quản lý sản phẩm</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Navbar */
        .navbar {
            background-color: #ffffffcc; /* Mờ nhẹ */
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            backdrop-filter: saturate(180%) blur(15px);
            transition: background-color 0.3s ease;
            padding: 0.8rem 2rem;
            font-weight: 500;
        }
        .navbar:hover {
            background-color: #ffffffee;
        }

        /* Brand */
        .navbar-brand {
            font-weight: 700;
            font-size: 1.75rem;
            color: #0d6efd;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s ease;
            user-select: none;
        }
        .navbar-brand:hover {
            color: #084298;
            text-decoration: none;
        }

        /* Nav links */
        .nav-link {
            color: #495057;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.35rem;
            position: relative;
            transition: color 0.25s ease, transform 0.25s ease;
            user-select: none;
        }
        .nav-link svg, .nav-link .bi {
            width: 20px;
            height: 20px;
            transition: transform 0.3s ease;
        }
        .nav-link:hover {
            color: #0d6efd;
            transform: translateY(-3px);
        }
        .nav-link:hover svg, .nav-link:hover .bi {
            transform: scale(1.15);
        }
        .nav-link.active {
            color: #0d6efd;
            font-weight: 600;
        }
        .nav-link.active::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 25%;
            width: 50%;
            height: 3px;
            background-color: #0d6efd;
            border-radius: 3px;
            opacity: 0.9;
            transition: width 0.3s ease;
        }

        /* Avatar */
        .avatar-img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            background-color: #f8f9fa;
            border: 2px solid #dee2e6;
            box-shadow: 0 2px 8px rgb(0 0 0 / 0.1);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }
        .avatar-img:hover {
            box-shadow: 0 4px 14px rgb(13 110 253 / 0.5);
            transform: scale(1.05);
        }

        /* Cart icon & badge */
        .cart-icon {
            position: relative;
            color: #495057;
            transition: color 0.3s ease, transform 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        .cart-icon:hover {
            color: #0d6efd;
            transform: scale(1.2);
        }
        .cart-badge {
            position: absolute;
            top: -6px;
            right: -10px;
            background-color: #dc3545;
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
            border-radius: 50%;
            padding: 0.25em 0.55em;
            box-shadow: 0 0 6px rgba(0,0,0,0.15);
            user-select: none;
            transition: transform 0.3s ease;
        }
        .cart-badge.animate {
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        /* Product images */
        .product-image {
            max-width: 100px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 8px rgb(0 0 0 / 0.05);
            transition: transform 0.3s ease;
        }
        .product-image:hover {
            transform: scale(1.05);
        }

        /* Responsive tweaks */
        @media (max-width: 575.98px) {
            .navbar-brand {
                font-size: 1.4rem;
            }
            .avatar-img {
                width: 40px;
                height: 40px;
            }
            .nav-link {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/NguyenThaiDuy/Product/">
            <i class="bi bi-box-seam"></i>
            Nguyễn Thái Duy
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/NguyenThaiDuy/Product/">
                        <i class="bi bi-list-ul"></i>
                        Danh sách sản phẩm
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/NguyenThaiDuy/Category/list">
                        <i class="bi bi-tags"></i>
                        Danh mục
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
            <?php if (SessionHelper::isAdmin()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/NguyenThaiDuy/Product/add">
                        <i class="bi bi-plus-circle"></i>
                        Thêm sản phẩm
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/NguyenThaiDuy/UserManagement/list">
                        <i class="bi bi-people"></i>
                        Quản lý người dùng
                    </a>
                </li>
            <?php endif; ?>

            <li class="nav-item">
                <?php if (SessionHelper::isLoggedIn()):
                    $userInfo = SessionHelper::getUserInfo();
                    $fullname = $_SESSION['fullname'] ?? ($userInfo['fullname'] ?? '');
                    $avatar = $userInfo['avatar'] ?? '/path/to/default-avatar.png';
                ?>
                    <a class="nav-link d-flex align-items-center gap-2" href="#" tabindex="0" role="button" aria-label="Thông tin người dùng">
                        <img src="<?php echo htmlspecialchars($avatar); ?>" alt="Avatar" class="avatar-img" />
                        <span><?php echo htmlspecialchars($fullname ?: $_SESSION['username']); ?></span>
                    </a>
                <?php else: ?>
                    <a class="nav-link" href="/NguyenThaiDuy/account/login">Đăng nhập</a>
                <?php endif; ?>
            </li>

            <li class="nav-item">
                <?php if (SessionHelper::isLoggedIn()): ?>
                    <a class="nav-link" href="/NguyenThaiDuy/account/logout">Đăng xuất</a>
                <?php endif; ?>
            </li>

            <li class="nav-item">
                <a href="/NguyenThaiDuy/Product/Cart" class="nav-link cart-icon position-relative" aria-label="Giỏ hàng">
                    <i class="bi bi-cart3"></i>
                    <span class="cart-badge" id="cartCount" aria-live="polite" aria-atomic="true"></span>
                </a>
            </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Ví dụ cập nhật số lượng giỏ hàng (thay thế bằng logic thực tế)
    const cartCountEl = document.getElementById('cartCount');
    const cartCount = -; // Thay giá trị này theo giỏ hàng thực tế
    if(cartCount > 0) {
        cartCountEl.textContent = cartCount;
        cartCountEl.classList.add('animate');
    } else {
        cartCountEl.textContent = '';
        cartCountEl.classList.remove('animate');
    }
</script>

</body>
</html>
