<?php

header("Content-Type: application/json");

session_start();

// Clear session
session_unset();
session_destroy();

// Clear cookie
setcookie('users', '', time() - 3600, '/');

echo json_encode([
    "success" => true,
    "message" => "Logout berhasil"
]);

?>