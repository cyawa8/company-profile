<?php
require "crypto.php";
require_once "connection.php";

$isValid = false;
$data = null;

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $id = decrypt($token);

    if (is_numeric($id)) {
        $query = mysqli_query($con, "SELECT * FROM verif WHERE id = $id");
        $data = mysqli_fetch_assoc($query);
        if ($data) {
            $isValid = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f4f6f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .logo {
            width: 30%;
            margin: auto;
            margin-bottom: 20px;
        }

        .alert-success {
            font-size: 1.2rem;
            font-weight: 200;
        }

        .checkmark,
        .error-mark {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .info-row {
            display: grid;
            grid-template-columns: 150px 1fr;
            margin-bottom: 8px;
            text-align: left;
            font-size: 15px;
        }

        .checkmark {
            color: #28a745;
        }

        .error-mark {
            color: #dc3545;
        }

        .info p {
            margin-bottom: 6px;
            font-size: 15px;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }

        @media (max-width: 576px) {
            .card {
                padding: 30px 20px;
            }

            .logo {
                width: 80px;
            }

            .checkmark,
            .error-mark {
                font-size: 2.5rem;
            }

            .alert-success {
                font-size: 1rem;
            }

            .info p {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <div class="card">
        <img src="./assets/images/armi-logo-item.png" alt="Logo" class="logo">

        <?php if ($isValid): ?>
            <div class="alert alert-success mt-3" role="alert">
                &#10004; &nbsp;Dokumen Terverifikasi
            </div>

            <hr>
            <div class="info mt-3 mx-auto">
                <div class="info-row"><span>Nomor Surat</span><span>: <?= htmlspecialchars($data['nomor']) ?></span></div>
                <div class="info-row"><span>Tanggal Publish</span><span>: <?= htmlspecialchars($data['tanggal']) ?></span></div>
                <div class="info-row"><span>Perihal</span><span>: <?= htmlspecialchars($data['perihal']) ?></span></div>
                <div class="info-row"><span>Ditujukan</span><span>: <?= htmlspecialchars($data['ditujukan']) ?></span></div>
                <div class="info-row"><span>Penandatangan</span><span>: <?= htmlspecialchars($data['tandatangan']) ?></span></div>
                <p class="mt-3 text-muted"><em>Surat ini telah diverifikasi melalui sistem.</em></p>
            </div>
        <?php else: ?>
            <div class="alert alert-danger mt-3" role="alert">
                &#10060; &nbsp;Dokumen Salah Atau Tidak Terverifikasi
            </div>
            <hr>
            <p class="text-muted">Link atau token tidak valid, atau surat tidak ditemukan.</p>
        <?php endif; ?>

        <div class="footer mt-4">
            &copy; <?= date('Y') ?> PT Artha Mitra Internasional<br>
            All Rights Reserved
        </div>
    </div>

</body>

</html>