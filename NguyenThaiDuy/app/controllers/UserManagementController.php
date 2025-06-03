<?php
require_once 'app/helpers/SessionHelper.php';
require_once 'app/models/UserModel.php';

class UserManagementController
{
    private $userModel;

    public function __construct()
    {
        SessionHelper::start();
        if (!SessionHelper::isAdmin()) {
            header('Location: /NguyenThaiDuy/Product');
            exit;
        }
        $this->userModel = new UserModel();
    }

    public function list()
    {
        $users = $this->userModel->getAllUsers();
        include_once 'app/views/user/list.php';
    }

    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $fullname = trim($_POST['fullname'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $role = $_POST['role'] ?? 'user';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';

            if ($username === '') $errors[] = 'Tên đăng nhập không được để trống.';
            if ($fullname === '') $errors[] = 'Họ và tên không được để trống.';
            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email không hợp lệ.';
            if (!in_array($role, ['admin', 'user'])) $role = 'user';
            if ($password === '') $errors[] = 'Mật khẩu không được để trống.';
            if ($password !== $confirmPassword) $errors[] = 'Mật khẩu xác nhận không khớp.';

            if ($this->userModel->getUserByUsername($username)) {
                $errors[] = 'Tên đăng nhập đã tồn tại.';
            }

            if (empty($errors)) {
                $added = $this->userModel->addUser($username, $fullname, $email, $role, $password);
                if ($added) {
                    header('Location: /NguyenThaiDuy/UserManagement/list');
                    exit;
                } else {
                    $errors[] = 'Có lỗi xảy ra khi thêm người dùng.';
                }
            }
        }

        include_once 'app/views/user/add.php';
    }

    public function delete($username = '')
    {
        if ($username !== '') {
            // Ngăn admin tự xóa chính mình
            if ($username === $_SESSION['username']) {
                $_SESSION['error'] = 'Bạn không thể xóa chính mình!';
            } else {
                $this->userModel->deleteUser($username);
            }
        }
        header('Location: /NguyenThaiDuy/UserManagement/list');
        exit;
    }

    public function edit($username = '')
{
    if ($username === '') {
        header('Location: /NguyenThaiDuy/UserManagement/list');
        exit;
    }

    $user = $this->userModel->getUserByUsername($username);
    if (!$user) {
        header('Location: /NguyenThaiDuy/UserManagement/list');
        exit;
    }

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fullname = trim($_POST['fullname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $role = $_POST['role'] ?? 'user';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirmpassword'] ?? '';

        if ($fullname === '') $errors[] = 'Họ và tên không được để trống.';
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email không hợp lệ.';
        if (!in_array($role, ['admin', 'user'])) $role = 'user';

        if ($password !== '') {
            if ($password !== $confirmPassword) {
                $errors[] = 'Mật khẩu xác nhận không khớp.';
            }
        }

        if (empty($errors)) {
            // Cập nhật người dùng
            $updated = $this->userModel->updateUser($username, $fullname, $email, $role, $password);
            if ($updated) {
                header('Location: /NguyenThaiDuy/UserManagement/list');
                exit;
            } else {
                $errors[] = 'Có lỗi xảy ra khi cập nhật người dùng.';
            }
        }
    }

    include_once 'app/views/user/edit.php';
}
}
