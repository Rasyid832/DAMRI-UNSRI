<?php
// backend/auth/logout.php
session_start();

$_SESSION = [];
session_destroy();

// Redirect kembali ke halaman index.php (atau halaman sebelumnya)
header('Location: ../../frontend/index.php');
exit;