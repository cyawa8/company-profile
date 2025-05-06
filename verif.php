<?php
include "connection.php";
include "auth.php";

$i = 1;
$data_surat = [];
$sql = mysqli_query($con, "
    SELECT v.*, t.Nama 
    FROM verif v
    JOIN surat_kategori t ON v.tipe = t.id
");

while ($data = mysqli_fetch_assoc($sql)) {
    $data_verif[] = $data;
}

// Penanganan form TAMBAH kategori sebelum ada output HTML
if (isset($_POST['submitverif'])) {
    $nomor = strtoupper($_POST['nomor']);
    $tanggal = $_POST['tanggal'];
    $perihal = ucfirst($_POST['perihal']);
    $ditujukan = ucfirst($_POST['ditujukan']);
    $tandatangan = ucfirst($_POST['penandatangan']);
    $tipe = ucfirst($_POST['tipe']);
    $query = "INSERT INTO `verif`(`nomor`, `tanggal`, `perihal`, `ditujukan`, `tandatangan`, `tipe`) VALUES ('$nomor', '$tanggal', '$perihal', '$ditujukan', '$tandatangan', '$tipe')";
    $insert = mysqli_query($con, $query);
    if ($insert) {
        header("Location: https://www.arthamitrainternasional.com/verif?status=success&from=modal");
    } else {
        echo '<script>alert("Data Verifikasi Surat Gagal Ditambahkan")</script>';
    }
}

// Penanganan form UBAH kategori
if (isset($_POST['submitubahverif'])) {
    $id = $_POST['id'];
    $nomor = strtoupper($_POST['nomor']);
    $tanggal = $_POST['tanggal'];
    $perihal = ucfirst($_POST['perihal']);
    $ditujukan = ucfirst($_POST['ditujukan']);
    $tandatangan = ucfirst($_POST['penandatangan']);
    $tipe = $_POST['tipe'];

    $stmt = $con->prepare("UPDATE verif SET nomor = ?, tanggal = ?, perihal = ?, ditujukan = ?, tandatangan = ?, tipe = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $nomor, $tanggal, $perihal, $ditujukan, $tandatangan, $tipe, $id);

    if ($stmt->execute()) {
        header("Location: https://www.arthamitrainternasional.com/verif?status=updated&from=modal");
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

                    <?php if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'superadmin'): ?>
                        <!-- Menu untuk admin -->
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.arthamitrainternasional.com/dashboard">KLBI</a>
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
                            <a class="nav-link active" href="https://www.arthamitrainternasional.com/verif">Verifikasi Surat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.arthamitrainternasional.com/surat_kategori">Kategori Surat</a>
                        </li>
                    <?php elseif ($_SESSION['role'] === 'staff'): ?>
                        <!-- Menu untuk staff (hanya Verifikasi Surat) -->
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.arthamitrainternasional.com/verif">Verifikasi Surat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.arthamitrainternasional.com/surat_kategori">Kategori Surat</a>
                        </li>
                    <?php endif; ?>

                </ul>
                <span class="navbar-text">
                    <li class="nav dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome <?= $_SESSION["role"] ?> <?= $_SESSION["nama_lengkap"] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="https://www.arthamitrainternasional.com/logout">Keluar</a></li>
                            <li><a class="dropdown-item" href="https://www.arthamitrainternasional.com/setting">Setting</a></li>
                        </ul>
                    </li>
                </span>
            </div>
        </div>
    </nav>

    <!--Dasboard Produk-->
    <div class="mt-3 container">
        <h2>List Data Surat</h2>
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahkategori">Tambah</button>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Tipe</th>
                        <th>Tanggal</th>
                        <th>Perihal</th>
                        <th>Ditunjukan Oleh</th>
                        <th>Ditandangani</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_verif as $i => $data):
                    ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $data['nomor'] ?></td>
                            <td><?= $data['Nama'] ?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td><?= $data['perihal'] ?></td>
                            <td><?= $data['ditujukan'] ?></td>
                            <td><?= $data['tandatangan'] ?></td>
                            <td><a href="#updatek<?= $data['id'] ?>" data-bs-toggle="modal">Ubah</a> || Hapus || <a href="https://www.arthamitrainternasional.com/generate_qr?id=<?= $data['id'] ?>" target="_blank">Generate</a></td>
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Surat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nomor" class="form-label">Nomor Dokumen:</label>
                            <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor Dokumen" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">Tipe Surat:</label>
                            <select class="form-control" id="tipe" name="tipe" required>
                                <option value="" disabled selected>Pilih Tipe Surat</option>
                                <?php
                                $kategori_query = mysqli_query($con, "SELECT * FROM surat_kategori");
                                while ($kategori = mysqli_fetch_assoc($kategori_query)) {
                                    echo "<option value='" . $kategori['id'] . "'>" . $kategori['Nama'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="perihal" class="form-label">Perihal:</label>
                            <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal" required>
                        </div>
                        <div class="mb-3">
                            <label for="tujuan" class="form-label">Ditujukan Kepada:</label>
                            <input type="text" class="form-control" id="ditujukan" name="ditujukan" placeholder="Ditujukan Kepada" required>
                        </div>
                        <div class="mb-3">
                            <label for="penandatangan" class="form-label">Ditandatangani Oleh:</label>
                            <input type="text" class="form-control" id="penandatangan" name="penandatangan" placeholder="Penandatangan" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submitverif">Tambah Data Surat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Ubah -->
    <?php
    foreach ($data_verif as $i => $data):
    ?>

        <div class="modal fade" id="updatek<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="POST">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Surat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nomor" class="form-label">Nomor Dokumen:</label>
                                <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor Dokumen" value="<?= htmlspecialchars($data['nomor']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tipe" class="form-label">Tipe Surat:</label>
                                <select class="form-control" id="tipe" name="tipe" required>
                                    <option value="" disabled>Pilih Tipe Surat</option>
                                    <?php
                                    $kategori_query = mysqli_query($con, "SELECT * FROM surat_kategori");
                                    while ($kategori = mysqli_fetch_assoc($kategori_query)) {
                                        $selected = $data['tipe'] == $kategori['id'] ? 'selected' : '';
                                        echo "<option value='" . $kategori['id'] . "' $selected>" . $kategori['Nama'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal:</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= htmlspecialchars($data['tanggal']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="perihal" class="form-label">Perihal:</label>
                                <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal" value="<?= htmlspecialchars($data['perihal']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="ditujukan" class="form-label">Ditujukan Kepada:</label>
                                <input type="text" class="form-control" id="ditujukan" name="ditujukan" placeholder="Ditujukan Kepada" value="<?= htmlspecialchars($data['ditujukan']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="penandatangan" class="form-label">Ditandatangani Oleh:</label>
                                <input type="text" class="form-control" id="penandatangan" name="penandatangan" placeholder="Penandatangan" value="<?= htmlspecialchars($data['tandatangan']) ?>" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submitubahverif">Ubah</button>
                        </div>

                        <input type="hidden" name="id" value="<?= $data['id'] ?>">

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
            text: status === 'success' ? 'Data berhasil ditambahkan!' : 'Data berhasil diubah!',
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