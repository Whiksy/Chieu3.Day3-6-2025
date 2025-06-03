<?php
class CategoryModel
{
    private $conn;
    private $table_name = "category";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getCategories()
    {
        $query = "SELECT id, name, description FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategoryById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table_name} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addCategory($name, $description)
    {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table_name} (name, description) VALUES (?, ?)");
        return $stmt->execute([$name, $description]);
    }

    public function updateCategory($id, $name, $description)
    {
        $stmt = $this->conn->prepare("UPDATE {$this->table_name} SET name = ?, description = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $id]);
    }

    public function deleteCategory($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table_name} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>