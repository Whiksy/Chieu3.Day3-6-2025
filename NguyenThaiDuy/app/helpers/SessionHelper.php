<?php
class SessionHelper {
    // Khởi động session nếu chưa bắt đầu
    public static function start() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Kiểm tra người dùng đã đăng nhập chưa
    public static function isLoggedIn() {
        self::start();
        return isset($_SESSION['username']);
    }

    // Đăng xuất người dùng, hủy session
    public static function logout()
    {
        self::start();  // đảm bảo session đã được start

        // Xóa tất cả session
        $_SESSION = [];

        // Hủy session cookie nếu có
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Hủy session
        session_destroy();
    }

    // Kiểm tra người dùng có phải admin không
    public static function isAdmin() {
        self::start();
        return isset($_SESSION['username']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }

    // Lấy vai trò của người dùng, mặc định là 'guest'
    public static function getRole() {
        self::start();
        return $_SESSION['role'] ?? 'guest';
    }

    // Lấy thông tin người dùng
    public static function getUserInfo() {
        self::start();
        return [
            'username' => $_SESSION['username'] ?? null,
            'email' => $_SESSION['email'] ?? null,
            'phone' => $_SESSION['phone'] ?? null,
            'avatar' => $_SESSION['avatar'] ?? null,
        ];
    }
}
?>
