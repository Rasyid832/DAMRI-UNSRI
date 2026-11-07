<?php

session_start();
require_once __DIR__ . '/../config/database.php';

$loginPage = '../../frontend/login.php';

function backWithError(string $msg, string $page): void {
    $_SESSION['flash_error'] = $msg;
    header("Location: $page");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: $loginPage"); 
    exit;
}

$email = trim($_POST['email'] ?? '');
$pass  = $_POST['password'] ?? '';

if ($email === '' || $pass === '') {
    backWithError('Email dan password wajib diisi.', $loginPage);
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

// Cek password user
if (!$user || !password_verify($pass, $user['password'])) {
    backWithError('Email atau password salah.', $loginPage);
}

// Ganti session id
session_regenerate_id(true);
$_SESSION['user_id'] = $user['id'];
$_SESSION['nama']    = $user['nama'];
$_SESSION['role']    = $user['role'];

header('Location: ../../frontend/index.php');
exit;