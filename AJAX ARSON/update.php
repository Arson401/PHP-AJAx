<?php
header('Content-Type: application/json');

try {
    $db = new PDO('sqlite:./database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $db->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
    $stmt->bindParam(':name', $data['name']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':id', $data['id']);
    $stmt->execute();

    echo json_encode(['message' => 'User updated successfully']);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
