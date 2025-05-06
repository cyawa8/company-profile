<?php
session_start();
require_once "connection.php";

// Tampilkan semua error saat development

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nik = trim($_POST['nik'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validasi awal
    if (empty($nik) || empty($password)) {
        $_SESSION['login_error'] = 'Username dan password wajib diisi.';
        header("Location: https://www.arthamitrainternasional.com/login");
        exit();
    }

    // Ambil data user dari database
    $stmt = $con->prepare("SELECT id, nama_depan, nama_belakang, username, password, role FROM admin WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $nik);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah user ditemukan
    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Sukses login: simpan ke session
            $_SESSION['id'] = $user['id'];
            $_SESSION['nama_lengkap'] = $user['nama_depan'] . ' ' . $user['nama_belakang'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'] ?? '';
            $_SESSION['isloggedin'] = true;
            $_SESSION['last_active'] = time();

            // var_dump($_SESSION); // Debugging
            // die();

            if ($_SESSION['role'] === 'superadmin') {
                header("Location: https://www.arthamitrainternasional.com/dashboard");
            } elseif ($_SESSION['role'] === 'admin') {
                header("Location: https://www.arthamitrainternasional.com/dashboard");
            } elseif ($_SESSION['role'] === 'staff') {
                header("Location: https://www.arthamitrainternasional.com/verif");
            }
            exit();
        } else {
            $_SESSION['login_error'] = 'Username atau password salah.';

            header("Location: https://www.arthamitrainternasional.com/login");
            exit();
        }
    } else {
        $_SESSION['login_error'] = 'Username atau password salah.';
        var_dump($_SESSION); // Debugging
        die();
    }
}
