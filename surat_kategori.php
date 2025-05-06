<?php
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require_once "connection.php";
include "auth.php";

$i = 1;
$data_kategori = [];
$sql = mysqli_query($con, "SELECT * FROM surat_kategori");
while ($data = mysqli_fetch_assoc($sql)) {
    $data_kategori[] = $data;
}

// Penanganan form TAMBAH kategori sebelum ada output HTML
if (isset($_POST['submitkategori'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token tidak valid");
    }

    $nama = $_POST['kategori'];

    if (empty($nama) || strlen($nama) > 100) {
        echo '<script>alert("Nama kategori tidak valid.")</script>';
        exit;
    }

    $stmt = $con->prepare("INSERT INTO surat_kategori (Nama) VALUES (?)");
    $stmt->bind_param("s", $nama);

    if ($stmt->execute()) {
        header("Location: https://www.arthamitrainternasional.com/surat_kategori?status=success&from=modal");
        exit;
    } else {
        echo '<script>alert("Kategori Gagal Ditambahkan")</script>';
    }
}


// Penanganan form UBAH kategori
if (isset($_POST['submitkategorik'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token tidak valid");
    }

    $id = $_POST['id'];
    $kategori = $_POST['nama'];

    if (!is_numeric($id) || empty($kategori)) {
        echo '<script>alert("Data tidak valid")</script>';
        exit;
    }

    $stmt = $con->prepare("UPDATE surat_kategori SET Nama = ? WHERE id = ?");
    $stmt->bind_param("si", $kategori, $id);

    if ($stmt->execute()) {
        header("Location: https://www.arthamitrainternasional.com/surat_kategori?status=updated&from=modal");
        exit;
    } else {
        echo '<script>alert("Gagal Merubah Data")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Verifikasi Surat</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/fae96b79f4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="jquery.min.js"></script>

    <!--Logo Title Bar-->
    <link rel="icon" href="assets/images/logoARMI.png" type="image/x-icon">
</head>

<body>

    <!-- Header -->

    <nav class="navbar navbar-expand-lg bg-transperency">
        <div class="container">
            <!--Logo-->
            <a class="navbar-brand" href="#"><img src="assets/images/armi-logo-item.png" alt="" width="150"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <?php if ($_SESSION['role'] === 'admin'): ?>
                        <!-- Menu untuk admin -->
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">KLBI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.arthamitrainternasional.com/produk-admin">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.arthamitrainternasional.com/partner">Partner</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.arthamitrainternasional.com/artikel">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.arthamitrainternasional.com/user">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.arthamitrainternasional.com/verif">Verifikasi Surat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active">Kategori Surat</a>
                        </li>
                    <?php elseif ($_SESSION['role'] === 'staff'): ?>
                        <!-- Menu untuk staff (hanya Verifikasi Surat) -->
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.arthamitrainternasional.com/verif">Verifikasi Surat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" active">Kategori Surat</a>
                        </li>
                    <?php endif; ?>

                </ul>
                <span class="navbar-text">
                    <li class="nav dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome <?= $_SESSION["role"] ?> <?= $_SESSION["nama_lengkap"] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="https://www.arthamitrainternasional.com/loginlogout">Keluar</a></li>
                            <li><a class="dropdown-item" href="https://www.arthamitrainternasional.com/setting">Setting</a></li>
                        </ul>
                    </li>
                </span>
            </div>
        </div>
    </nav>

    <!--Dasboard Produk-->
    <div class="mt-3 container">
        <h2>List Kategori</h2>
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahkategori">Tambah</button>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_kategori as $i => $datas):
                    ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($datas['Nama']) ?></td>
                            <td><a href="#updatek<?= $datas['id'] ?>" data-bs-toggle="modal">Ubah</a></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--Modal Tambah-->

    <div class="modal fade" id="tambahkategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title">Nama Kategori Surat:</label>
                            <input type="Text" class="form-control" id="kategori" name="kategori" placeholder="Nama Kategori" required>
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submitkategori">Tambah Kategori</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Ubah -->
    <?php
    foreach ($data_kategori as $i => $datas):
    ?>

        <div class="modal fade" id="updatek<?= $datas['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="POST">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Kategori</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title">Ubah Nama Kategori:</label>
                                <input type="Text" class="form-control" id="kategori" name="nama" placeholder="Nama Kategori" value="<?= htmlspecialchars($datas['Nama']) ?>" required>
                                <input type="hidden" name="id" value="<?= htmlspecialchars($datas['id']) ?>">
                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                            </div>
                        </div>
                        <div class=" modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submitkategorik">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    <?php
    endforeach;
    ?>

</body>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/datatables-demo.js"></script>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const from = urlParams.get('from');
    if ((status === 'success' || status === 'updated') && from === 'modal') {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: status === 'success' ? 'Kategori berhasil ditambahkan!' : 'Kategori berhasil diubah!',
            timer: 2000,
            showConfirmButton: false
        }).then(() => {
            const url = new URL(window.location.href);
            url.search = '';
            window.history.replaceState({}, document.title, url.toString());
        });
    }
</script>


</html>