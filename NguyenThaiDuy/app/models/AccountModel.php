<?php
class AccountModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAccountByUsername($username)
    {
        $query = "SELECT * FROM account WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function save($username, $fullName, $password, $role, $email, $phone, $avatar)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO account (username, fullname, password, role, email, phone, avatar) 
                  VALUES (:username, :fullname, :password, :role, :email, :phone, :avatar)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':fullname', $fullName);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':avatar', $avatar);
        return $stmt->execute();
    }
}
?>
