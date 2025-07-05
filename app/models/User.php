<?php

namespace app\models;

class User
{
    public \mysqli $database;

    public function __construct()
    {
        $this->database = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        if ($this->database->connect_error) {
            die('Error connecting: ' . $this->database->connect_error);
        }
    }

    public function getAllUsers(): array
    {
        $result = $this->database->query("SELECT * FROM users ORDER BY id DESC");
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function createUser(string $firstName, string $lastName, string $email): bool
    {
        $stmt = $this->database->prepare("INSERT INTO users (first_name, last_name, email, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param('sss', $firstName, $lastName, $email);
        return $stmt->execute();
    }
    
    // Оновлення користувача за id
    public function updateUser(int $id, string $firstName, string $lastName, string $email): bool
    {
        $stmt = $this->database->prepare(
            "UPDATE users SET first_name = ?, last_name = ?, email = ? WHERE id = ?"
        );
        $stmt->bind_param('sssi', $firstName, $lastName, $email, $id);
        return $stmt->execute();
    }

    // Видалення користувача за id
    public function deleteUser(int $id): bool
    {
        $stmt = $this->database->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public function getUserById(int $id): ?array
    {
        $stmt = $this->database->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ? $result->fetch_assoc() : null;
    }

}
