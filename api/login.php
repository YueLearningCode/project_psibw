<?php

header("Content-Type: application/json");

require_once "../config/config.php";

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

if (!in_array($user['role'], $allowedRoles)) {

    echo json_encode([
        "success" => false,
        "message" => "Role tidak valid"
    ]);
    exit;
}

echo json_encode([
    "success" => true,
    "message" => "Login berhasil",
    "user" => [
        "ni" => $user['ni'],
        "username" => $user['username'],
        "role" => $user['role']
    ]
]);
