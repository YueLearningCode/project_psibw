<?php

header("Content-Type: application/json");

require_once "../config/config.php";

// Start session


$data = json_decode(file_get_contents("php://input"), true);

if (
    !isset($data['username']) ||
    !isset($data['password'])
) {
    echo json_encode([
        "success" => false,
        "message" => "Username dan password wajib diisi"
    ]);
    exit;
}

$username = mysqli_real_escape_string($conn, $data['username']);
$password = $data['password'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE username = '$username' LIMIT 1"
);

if (mysqli_num_rows($query) <= 0) {

    echo json_encode([
        "success" => false,
        "message" => "Username tidak ditemukan"
    ]);
    exit;
}

$user = mysqli_fetch_assoc($query);

if (!password_verify($password, $user['password'])) {

    echo json_encode([
        "success" => false,
        "message" => "Password salah"
    ]);
    exit;
}

$allowedRoles = ['admin', 'dosen', 'mahasiswa'];

// Normalize role to lowercase for consistency
$userRole = strtolower($user['role']);

if (!in_array($userRole, $allowedRoles)) {

    echo json_encode([
        "success" => false,
        "message" => "Role tidak valid"
    ]);
    exit;
}

// Set session on successful login
session_start();
$_SESSION['users'] = [
    "ni" => $user['ni'],
    "username" => $user['username'],
    "role" => $userRole
];

// Also set cookie as backup (expires in 24 hours)
setcookie('users', json_encode([
    "ni" => $user['ni'],
    "username" => $user['username'],
    "role" => $userRole
]), time() + (24 * 60 * 60), '/');

echo json_encode([
    "success" => true,
    "message" => "Login berhasil",
    "users" => [
        "ni" => $user['ni'],
        "username" => $user['username'],
        "role" => $userRole
    ]
]);
