<?php
try {
    $db = new PDO('sqlite:./database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY,
        name TEXT,
        email TEXT
    )");
    echo "Database initialized successfully.";
} catch (PDOException $e) {
    echo "An error occurred: " . $e->getMessage();
}
?>
