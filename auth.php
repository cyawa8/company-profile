<?php
session_start();

// Jika belum login, redirect ke login
if (!isset($_SESSION['isloggedin']) || $_SESSION['isloggedin'] !== true) {
    header("Location: https://www.arthamitrainternasional.com/login");
    exit();
}

// // Session Timeout: 30 menit (1800 detik)
// $timeout_duration = 1800;
// if (isset($_SESSION['last_active']) && (time() - $_SESSION['last_active']) > $timeout_duration) {
//     session_unset();
//     session_destroy();
//     header("Location: login.php?timeout=1");
//     exit();
// }
// $_SESSION['last_active'] = time();

// // Session Hijacking Protection: regenerasi ID sekali saat login
// if (!isset($_SESSION['session_regenerated'])) {
//     session_regenerate_id(true);
//     $_SESSION['session_regenerated'] = true;
// }

// // Validasi role jika diperlukan
// if (isset($required_role) && $_SESSION['role'] !== $required_role) {
//     header("Location: login.php");
//     exit();
// }
