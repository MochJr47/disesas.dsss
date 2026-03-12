<?php
require "db.php";

$password = password_hash("admin123", PASSWORD_BCRYPT);

$stmt = $conn->prepare("UPDATE users SET password_hash=? WHERE username='admin'");
$stmt->execute([$password]);

echo "Admin password set successfully!";
?>