<?php
require_once "connection.php";
include "auth.php";
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
  <title>Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/fae96b79f4.js" crossorigin="anonymous"></script>
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
              <a class="nav-link active" href="#">KLBI</a>
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
              <a class="nav-link" href="https://www.arthamitrainternasional.com/surat_kategori">Surat Kategori</a>
            </li>
          <?php elseif ($_SESSION['role'] === 'staff'): ?>
            <!-- Menu untuk staff (hanya Verifikasi Surat) -->
            <li class="nav-item">
              <a class="nav-link" href="https://www.arthamitrainternasional.com/verif">Verifikasi Surat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.arthamitrainternasional.com/surat_kategori">Surat Kategori</a>
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
    <h2>List Kategori</h2>
    <div class="table-responsive">
      <table class="table" id="dataTable" width="100%" cellspacing="0">
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahkategori">Tambah</button>
        <thead>
          <tr>
            <th>no</th>
            <th>KLBI</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $sql = mysqli_query($con, "select * from kategori");
          while ($data = mysqli_fetch_array($sql)) {
            $id = $data['id'];
            $nama = $data['namak'];
            $deskripsi = $data['deskripsi'];
            $uraian = $data['uraian'];
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $nama ?></td>
              <td><?= $deskripsi ?></td>
              <td><?= $uraian ?></td>
              <td><a href="#updatek<?= $id ?>" data-bs-toggle="modal">Ubah</a></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!--Modal Tambah-->
  <div class="card-header py-0">
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
                <label for="title">KLBI:</label>
                <input type="Text" class="form-control" id="kategori" name="kategori" placeholder="KLBI" required>
              </div>

              <div class="mb-3">
                <label for="title">Nama:</label>
                <input type="Text" class="form-control" id="deskripsi" name="deskripsik" placeholder="Nama" required>
              </div>

              <div class="mb-3">
                <label for="title">Uraian:</label>
                <textarea class="form-control" name="uraian" id="" cols="30" rows="10" placeholder="Uraian"></textarea>
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
  </div>

  <?php
  if (isset($_POST['submitkategori'])) {
    $kategori = $_POST['kategori'];
    $deskripsik = $_POST['deskripsik'];
    $uraian = $_POST['uraian'];
    $query = "INSERT INTO `kategori`(`namak`, `deskripsi`, `uraian`) VALUES ('$kategori', '$deskripsik', '$uraian')";
    $insert = mysqli_query($con, $query);
    if ($insert) {
      echo '<script>alert("Kategori Berhasil Ditambahkan")</script>';
      echo '<script>window.location.assign("https://www.arthamitrainternasional.com/dashboard");</script>';
    } else {
      echo '<script>alert("Kategori Gagal Ditambahkan")</script>';
    }
  } else {
  }

  ?>

  <!-- Modal Ubah -->
  <?php
  $sql = mysqli_query($con, "select * from kategori");
  while ($data = mysqli_fetch_array($sql)) {
    $id = $data['id'];
    $nama = $data['namak'];
    $deskripsi = $data['deskripsi'];
    $uraian = $data['uraian'];
  ?>

    <div class="card-header py-0">
      <div class="modal fade" id="updatek<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="" method="POST">

              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <div class="mb-3">
                  <label for="title">Kategori:</label>
                  <input type="Text" class="form-control" id="kategori" name="kategorik" placeholder="Kategori" value="<?= $nama ?>" required>
                  <input type="hidden" class="form-control" id="id" name="idk" placeholder="idk" value="<?= $id ?>" required>
                </div>

                <div class="mb-3">
                  <label for="title">Deskripsi:</label>
                  <input type="Text" class="form-control" id="deskripsi" name="deskripsik" placeholder="Deskrispsi" value="<?= $deskripsi ?>" required>
                </div>

                <div class="mb-3">
                  <label for="title">Uraian:</label>
                  <textarea class="form-control" name="uraian" id="uraian" cols="30" rows="10" placeholder="Uraian"><?= $uraian ?></textarea>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submitkategorik">Ubah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  <?php
  }
  ?>
  <?php
  if (isset($_POST['submitkategorik'])) {
    $id = $_POST['idk'];
    $kategori = $_POST['kategorik'];
    $deskripsi = $_POST['deskripsik'];
    $uraian = $_POST['uraian'];

    if (mysqli_query($con, "UPDATE `kategori` SET `namak`='$kategori',`deskripsi`='$deskripsi',`uraian`='$uraian' WHERE `id`='$id'")) {
      echo '<script>alert("Data berhasil diubah")</script>';
      echo '<script>window.location.assign("https://www.arthamitrainternasional.com/dashboard");</script>';
    } else {
      echo '<script>alert("Gagal Merubah Data: ' . mysqli_error($con) . '")</script>'; // Tampilkan pesan error jika query gagal
    }
  }
  ?>

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

</body>

</html>