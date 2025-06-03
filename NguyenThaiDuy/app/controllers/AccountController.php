<?php
require_once('app/config/database.php');
require_once('app/models/AccountModel.php');
require_once 'app/helpers/SessionHelper.php';

class AccountController
{
    private $accountModel;
    private $db;

    public function __construct()
    {
        // Khởi động session nếu chưa
        SessionHelper::start();

        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
    }

    public function register()
    {
        include_once 'app/views/account/register.php';
    }

    public function login()
    {
        include_once 'app/views/account/login.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username'] ?? '');
            $fullName = trim($_POST['fullname'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';
            $email = trim($_POST['email'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $avatar = trim($_POST['avatar'] ?? ''); // URL avatar
            $role = $_POST['role'] ?? 'user';
            $errors = [];

            if (empty($username)) $errors['username'] = "Vui lòng nhập username!";
            if (empty($fullName)) $errors['fullname'] = "Vui lòng nhập fullname!";
            if (empty($password)) $errors['password'] = "Vui lòng nhập password!";
            if ($password != $confirmPassword) $errors['confirmPass'] = "Mật khẩu và xác nhận chưa khớp!";
            if (empty($email)) $errors['email'] = "Vui lòng nhập email!";
            if (empty($phone)) $errors['phone'] = "Vui lòng nhập số điện thoại!";

            if (!in_array($role, ['admin', 'user'])) $role = 'user';

            if ($this->accountModel->getAccountByUsername($username)) {
                $errors['account'] = "Tài khoản này đã được đăng ký!";
            }

            if (count($errors) > 0) {
                include_once 'app/views/account/register.php';
            } else {
                $result = $this->accountModel->save($username, $fullName, $password, $role, $email, $phone, $avatar);
                if ($result) {
                    header('Location: /NguyenThaiDuy/account/login');
                    exit;
                } else {
                    $errors['save'] = "Lỗi lưu dữ liệu!";
                    include_once 'app/views/account/register.php';
                }
            }
        }
    }

    public function logout()
    {
        SessionHelper::logout();
        header('Location: /NguyenThaiDuy/product');
        exit;
    }

    public function checkLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $account = $this->accountModel->getAccountByUsername($username);

            if ($account && password_verify($password, $account->password)) {
                $_SESSION['username'] = $account->username;
                $_SESSION['role'] = $account->role;
                $_SESSION['email'] = $account->email;
                $_SESSION['phone'] = $account->phone;
                $_SESSION['avatar'] = $account->avatar;
                header('Location: /NguyenThaiDuy/product');
                exit;
            } else {
                $error = $account ? "Mật khẩu không đúng!" : "Không tìm thấy tài khoản!";
                include_once 'app/views/account/login.php';
                exit;
            }
        }
    }
}
?>
