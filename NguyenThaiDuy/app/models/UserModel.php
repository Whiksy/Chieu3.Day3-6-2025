<?php
require_once 'app/config/database.php';

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    public function getAllUsers()
    {
        $stmt = $this->db->prepare("SELECT username, fullname, email, role FROM account");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM account WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addUser($username, $fullname, $email, $role, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO account (username, fullname, email, role, password) VALUES (:username, :fullname, :email, :role, :password)");
        return $stmt->execute([
            'username' => $username,
            'fullname' => $fullname,
            'email' => $email,
            'role' => $role,
            'password' => $hashedPassword,
        ]);
    }
    public function updateUser($username, $fullname, $email, $role, $password = null)
    {
    if ($password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE account SET fullname = :fullname, email = :email, role = :role, password = :password WHERE username = :username");
        return $stmt->execute([
            'fullname' => $fullname,
            'email' => $email,
            'role' => $role,
            'password' => $hashedPassword,
            'username' => $username,
        ]);
    } else {
        $stmt = $this->db->prepare("UPDATE account SET fullname = :fullname, email = :email, role = :role WHERE username = :username");
        return $stmt->execute([
            'fullname' => $fullname,
            'email' => $email,
            'role' => $role,
            'username' => $username,
        ]);
    }
    }


    public function deleteUser($username)
    {
        $stmt = $this->db->prepare("DELETE FROM account WHERE username = :username");
        return $stmt->execute(['username' => $username]);
    }
}
