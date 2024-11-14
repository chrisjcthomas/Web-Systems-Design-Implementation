<?php
// config/db.php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=adWebApp", "root", ""); // Use your MySQL root password if set
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
