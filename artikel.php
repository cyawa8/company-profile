<?php
require_once "connection.php";

function generaterandomstring()
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < 10; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-22KTXRH9QS"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-22KTXRH9QS');
  </script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <title>Artikel</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/fae96b79f4.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/Chart.js/Chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/artikel.css">

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
          <li class="nav-item">
            <a class="nav-link" href="https://arthamitrainternasional.com/dashboard">KLBI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="https://arthamitrainternasional.com/produk-admin">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://arthamitrainternasional.com/partner">Partner</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://arthamitrainternasional.com/user">User</a>
          </li>

        </ul>
        <span class="navbar-text">
          <li class="nav dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Admin <?= $_SESSION["nama_depan"] ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="https://arthamitrainternasional.com/logout">Keluar</a></li>
              <li><a class="dropdown-item" href="https://arthamitrainternasional.com/setting">Setting</a></li>
            </ul>
          </li>
        </span>
      </div>
    </div>
  </nav>

  <!--Dasboard Produk-->
  <div class="mt-3 container">
    <h2>List Artikel</h2>
    <div class="table-responsive">
      <table class="table" id="dataTable" width="100%" cellspacing="0">
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahproduk">Tambah</button>
        <thead>
          <tr>
            <th>No</th>
            <th>Judul Artikel</th>
            <th>Isi Artikel</th>
            <th>Tanggal</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $sql = mysqli_query($con, "select * from artikel where status = '0'");
          while ($data = mysqli_fetch_array($sql)) {
            $id = $data['id'];
            $judul = $data['judul'];
            $konten = $data['konten'];
            $tanggal = $data['tanggal'];
            $gambar = $data['gambar'];
            $status = $data['status'];
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $judul ?></td>
              <td><?php echo strlen($konten) > 200 ? substr($konten, 0, 200) . '...' : $konten; ?></td>
              <td><?= $tanggal ?></td>
              <td><?= $gambar ?></td>
              <td><?php if ($status == 0) {
                    echo "Deactive";
                  } else if ($status == 1) {
                    echo "Active";
                  } else {
                    echo "No Status";
                  } ?></td>
              <td><a href="#ubaha<?= $id ?>" data-bs-toggle="modal">Ubah</a> ||
                <?php if ($status == 0) { ?>
                  <a href="https://arthamitrainternasional.com/deactartikel?idp=<?= $id ?>">Deactive</a>
                <?php } else if ($status == 1) { ?>
                  <a href="https://arthamitrainternasional.com/deactartikel?idp=<?= $id ?>">Active</a>
                <?php } else {
                  echo "No Status";
                } ?>
              </td>

            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- data yang tidak aktif -->

  <div class="mt-3 container">
    <h2>Inactive Data</h2>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul Artikel</th>
            <th>Isi Artikel</th>
            <th>Tanggal</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $sql = mysqli_query($con, "select * from artikel where status = '1'");
          while ($data = mysqli_fetch_array($sql)) {
            $id = $data['id'];
            $judul = $data['judul'];
            $konten = $data['konten'];
            $tanggal = $data['tanggal'];
            $gambar = $data['gambar'];
            $status = $data['status'];
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $judul ?></td>
              <td><?php echo strlen($konten) > 200 ? substr($konten, 0, 200) . '...' : $konten; ?></td>
              <td><?= $tanggal ?></td>
              <td><?= $gambar ?></td>
              <td>
                <?php if ($status == 0) {
                  echo "Deactive";
                } else if ($status == 1) {
                  echo "Active";
                } else {
                  echo "No Status";
                } ?>
              </td>
              <td>
                <?php if ($status == 0) { ?>
                  <a href="https://arthamitrainternasional.com/deactartikel?idp=<?= $id ?>">Deactive</a>
                <?php } else if ($status == 1) { ?>
                  <a href="https://arthamitrainternasional.com/deactartikel?idp=<?= $id ?>">Active</a>
                <?php } else {
                  echo "No Status";
                } ?>
              </td>
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
    <div class="modal fade" id="tambahproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="POST" enctype="multipart/form-data">

            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Artikel</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="mb-3">
                <label for="title">Judul:</label>
                <input type="Text" class="form-control" id="nbarang" name="judul" placeholder="Nama Barang" required>
              </div>

              <div class="mb-3">
                <label for="cars">Isi Konten Artikel:</label>
                <textarea class="form-control" id="nbarang" name="isi" rows="6" placeholder="Nama Barang" required></textarea>
              </div>

              <div class="mb-3">
                <label for="title">Banner Artikel:</label>
                <input type="file" class="form-control" id="foto" name="foto" required>
              </div>

              <div class="mb-3">
                <label for="timestamp">Tanggal:</label>
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $waktu_sekarang = time();
                ?>
                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Upload" required>
              </div>

              <script>
                document.addEventListener('DOMContentLoaded', function() {
                  let timestamp = <?php echo $waktu_sekarang; ?>; // Mengambil nilai timestamp PHP
                  let date = new Date(timestamp * 1000); // Mengonversi ke milidetik

                  let formattedDate = date.toISOString().slice(0, 16); // Format yang sesuai dengan datetime-local

                  document.getElementById('tanggal').value = formattedDate;
                });
              </script>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submitproduk">Tambah Produk</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php


  if (isset($_POST['submitproduk'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];

    $target_dir = "assets/gambar/";
    $nama_file = basename($_FILES["foto"]["name"]);
    $target_file = $target_dir . $nama_file;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imagesize = $_FILES["foto"]["size"];
    $random = generaterandomstring(20);
    $imgname =  $random . "." . $imageFileType;

    list($width, $height) = getimagesize($_FILES["foto"]["tmp_name"]);
    $aspectRatio = $width / $height;
    $expectedAspectRatio = 2; // Sesuaikan dengan aspek rasio yang diinginkan

    // if(abs($aspectRatio - $expectedAspectRatio) > 0.01) {
    //     echo '<script>alert("Aspek rasio gambar harus 2:1")</script>';
    // } else {
    if ($imagesize > 50000000) {
      echo '<script>alert("File Lebih Dari 500 kb")</script>';
    } else {
      if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo '<script>alert("Tipe File Salah")</script>';
      } else {
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $imgname);

        $query = "INSERT INTO `artikel`(`judul`, `konten`, `tanggal`, `gambar`) VALUES ('$judul', '$isi', '$tanggal', '$imgname')";
        $insert = mysqli_query($con, $query);
        if ($insert) {
          echo '<script>alert("Kategori Berhasil Ditambahkan")</script>';
          echo '<script>window.location.assign("artikel");</script>';
        } else {
          echo '<script>alert("Kategori Gagal Ditambahkan")</script>';
        }
      }
    }
    // }
  } else {
  }

  ?>

  <!-- ubah artikel -->
  <?php
  $sql = mysqli_query($con, "select * from artikel");
  while ($data = mysqli_fetch_array($sql)) {
    $id = $data['id'];
    $judul = $data['judul'];
    $konten = $data['konten'];
    $tanggal = $data['tanggal'];
    $gambar = $data['gambar'];
  ?>

    <div class="card-header py-0">
      <div class="modal fade" id="ubaha<?= $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">

              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Artikel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <div class="mb-3">
                  <label for="title">Judul:</label>
                  <input type="Text" class="form-control" id="nbarang" name="judul" placeholder="<?= $judul ?>" value="<?= $judul ?>" required>
                  <input type="hidden" class="form-control" id="ida" name="ida" placeholder="<?= $id ?>" value="<?= $id ?>" required>
                </div>

                <div class="mb-3">
                  <label for="cars">Isi Konten Artikel:</label>
                  <textarea class="form-control" id="nbarang" name="isi" rows="6" placeholder="Nama Barang" required><?= $konten ?></textarea>
                </div>

                <div class="fotoprofil">
                  <label for="cars">Banner:</label>
                  <label for="file-input" class="profile-image-container d-flex">
                    <div class="gambar">
                      <img src="assets/gambar/<?= $gambar ?>" alt="Profile Image" class="profile-image" id="profile-image" name="gambarrr">
                    </div>
                  </label>
                  <input type="file" class="form-control" id="file-input" accept=".png, .jpg, .jpeg" name="upgambar" onchange="previewImage(this);">
                </div>

                <div class="mb-3">
                  <label for="timestamp">Tanggal:</label>
                  <?php
                  date_default_timezone_set('Asia/Jakarta');
                  $waktu_sekarang = time();
                  ?>
                  <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" placeholder="<?= $tanggal ?>" value="<?= $tanggal ?>" required>
                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="ubahartikel">Ubah Produk</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  <?php
  }
  if (isset($_POST['ubahartikel'])) {
    $judul = $_POST['judul'];
    $konten = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    $id = $_POST['ida'];

    $target_dir = "assets/gambar/";
    $nama_file = basename($_FILES["upgambar"]["name"]);
    $target_file = $target_dir . $nama_file;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imagesize = $_FILES["upgambar"]["size"];
    $random = generaterandomstring(20);
    $imgname = $random . "." . $imageFileType;


    $query = "UPDATE `artikel` SET `judul`='$judul',`konten`='$konten',`tanggal`='$tanggal'";
    $select = mysqli_query($con, "select * from artikel");
    $selects = mysqli_fetch_array($select);

    if ($nama_file != '') {
      if ($imagesize > 500000) {
        echo '<script>alert("File Lebih Dari 500 kb")</script>';
      } else {
        if (!in_array($imageFileType, ["jpg", "png", "jpeg"])) {
          echo '<script>alert("Tipe File Salah")</script>';
        } else {
          // Menghapus file gambar lama
          unlink($target_dir . $selects["gambar"]);

          // Upload file gambar baru
          move_uploaded_file($_FILES["upgambar"]["tmp_name"], $target_dir . $imgname);

          // Menambahkan kolom 'image' ke query
          $query .= ", `gambar`='$imgname'";
        }
      }
    }

    $query .= " WHERE `id`='$id'";

    $result = mysqli_query($con, $query);

    if ($result) {
      echo '<script>alert("Data Berhasil Diubah")</script>';
      echo '<script>window.location.assign("artikel");</script>';
    } else {
      echo '<script>alert("Data Gagal Diubah")</script>';
    }
  }
  ?>

  <script src="js/script.js"></script>
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
    function previewImage(input) {
      var fileInput = input;
      var file = fileInput.files[0];

      if (file) {
        var reader = new FileReader();

        reader.onload = function(e) {
          document.getElementById('profile-image').src = e.target.result;
        };

        reader.readAsDataURL(file);
      }
    }
  </script>
</body>

</html>