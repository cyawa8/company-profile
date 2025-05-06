<?php
require_once "connection.php";
if (!isset($_SESSION['isloggedin'])) {
  header("location:https://www.arthamitrainternasional.com/login");
  exit();
}
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
  <title>Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/fae96b79f4.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/Chart.js/Chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/produk-admin.css">

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
            <a class="nav-link" href="https://www.arthamitrainternasional.com/dashboard">KLBI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Produk</a>
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

        </ul>
        <span class="navbar-text">
          <li class="nav dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Admin <?= $_SESSION["nama_depan"] ?>
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
    <h2>List Produk</h2>
    <div class="table-responsive">
      <table class="table" id="dataTable" width="100%" cellspacing="0">
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahproduk">Tambah</button>
        <thead>
          <tr>
            <th>no</th>
            <th>Nama</th>
            <th>KLBI</th>
            <th>Gambar</th>
            <th>Tanggal</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $sql = mysqli_query($con, "select * from produk inner join kategori on produk.kategori = kategori.id ");
          while ($data = mysqli_fetch_array($sql)) {
            $idp = $data['idp'];
            $nama = $data['nama'];
            $namak = $data['namak'];
            $kategori = $data['kategori'];
            $gambar = $data['image'];
            $tanggal = $data['tanggal'];
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $nama ?></td>
              <td><?= $namak ?></td>
              <td><?= $gambar ?></td>
              <td><?= $tanggal ?></td>
              <td><a href="#ubahss<?= $idp ?>" data-bs-toggle="modal">Ubah</a> || <a href="https://www.arthamitrainternasional.com/hapusproduk?idp=<?= $idp ?>">Hapus</a></td>
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
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="mb-3">
                <label for="title">Nama Barang:</label>
                <input type="Text" class="form-control" id="nbarang" name="nbarang" placeholder="Nama Barang" required>
              </div>

              <div class="mb-3">
                <label for="cars">Kategori Barang:</label>
                <select class="form-select" aria-label="Default select example" id="kategori" name="kategori">
                  <option value="">Pilih</option>
                  <?php
                  $select = mysqli_query($con, "SELECT * FROM `kategori`");
                  while ($f = mysqli_fetch_array($select)) {
                    $id = $f['id'];
                    $nama = $f['namak'];
                    $ukuran = $f['kategori'];
                  ?>
                    <option value="<?php echo $id ?>"><?= $nama ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="title">Gambar Barang:</label>
                <input type="file" class="form-control" id="foto" name="fotos" required>
              </div>


              <div class="mb-3">
                <label for="title">Tanggal:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Upload" required>
              </div>
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
    $kategori = $_POST['kategori'];
    $nama = $_POST['nbarang'];
    $tanggal = $_POST['tanggal'];

    $target_dir = "assets/gambar/";
    $nama_file = basename($_FILES["fotos"]["name"]);
    $target_file = $target_dir . $nama_file;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imagesize = $_FILES["fotos"]["size"];
    $random = generaterandomstring(20);
    $imgname =  $random . "." . $imageFileType;

    if ($imagesize > 50000000) {
      echo '<script>alert("File Lebih Dari 500 kb")</script>';
    } else {
      if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo '<script>alert("Tipe File Salah")</script>';
      } else {
        move_uploaded_file($_FILES["fotos"]["tmp_name"], $target_dir . $imgname);

        $query = "INSERT INTO `produk`(`kategori`, `nama`, `image`, `tanggal`) VALUES ('$kategori', '$nama', '$imgname', '$tanggal')";
        $insert = mysqli_query($con, $query);
        if ($insert) {
          echo '<script>alert("Kategori Berhasil Ditambahkan")</script>';
          echo '<script>window.location.assign("https://www.arthamitrainternasional.com/produk-admin");</script>';
        } else {
          echo '<script>alert("Kategori Gagal Ditambahkan")</script>';
        }
      }
    }
  } else {
  }

  ?>

  <!-- Modal Ubah -->
  <?php
  $i = 1;
  $sql = mysqli_query($con, "select * from produk inner join kategori on produk.kategori = kategori.id ");
  while ($data = mysqli_fetch_array($sql)) {
    $idp = $data['idp'];
    $id = $data['id'];
    $nama = $data['nama'];
    $namak = $data['namak'];
    $kategori = $data['kategori'];
    $gambar = $data['image'];
    $tanggal = $data['tanggal'];
  ?>
    <div class="card-header py-0">
      <div class="modal fade" id="ubahss<?= $idp ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <form action="" method="POST" enctype="multipart/form-data">

              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <div class="mb-3">
                  <label for="title">Nama Barang:</label>
                  <input type="Text" class="form-control" id="nbarang" name="nbarangs" placeholder="<?= $nama ?>" value="<?= $nama ?>" required>
                  <input type='hidden' class="form-control" id="idp" name="idproduk" placeholder="<?= $idp ?>" value="<?= $idp ?>" required>
                </div>

                <div class="mb-3">
                  <label for="cars">Kategori Barang:</label>
                  <select class="form-select" aria-label="Default select example" id="kategori" name="kategori">
                    <option value="<?= $id ?>"><?= $namak ?></option>
                    <?php
                    $select = mysqli_query($con, "SELECT * FROM `kategori`");
                    while ($f = mysqli_fetch_array($select)) {
                      $id = $f['id'];
                      $nama = $f['namak'];
                      $ukuran = $f['kategori'];
                    ?>
                      <option value="<?php echo $id ?>"><?= $nama ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>

                <div class="fotoprofil d-flex">
                  <label for="file-input" class="profile-image-container col-md-4">
                    <div class="gambar">
                      <img src="assets/gambar/<?= $gambar ?>" alt="Profile Image" class="profile-image" id="profile-image" name="gambarrr">
                    </div>
                  </label>
                  <input type="file" class="form-control col-md-8" id="file-input" accept=".png, .jpg, .jpeg" name="upgambar" onchange="previewImage(this);">
                </div>


                <div class="mb-3">
                  <label for="title">Tanggal:</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Upload" value="<?= $tanggal ?>">
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submitubah">Ubah Data Produk</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php
  }

  if (isset($_POST['submitubah'])) {
    $nbarang = $_POST['nbarangs'];
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];
    $id = $_POST['idproduk'];

    $target_dir = "assets/gambar/";
    $nama_file = basename($_FILES["upgambar"]["name"]);
    $target_file = $target_dir . $nama_file;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imagesize = $_FILES["upgambar"]["size"];
    $random = generaterandomstring(20);
    $imgname = $random . "." . $imageFileType;

    $query = "UPDATE `produk` SET `kategori`='$kategori', `nama`='$nbarang', `tanggal`='$tanggal'";
    $select = mysqli_query($con, "select * from produk");
    $selects = mysqli_fetch_array($select);

    if ($nama_file != '') {
      if ($imagesize > 500000) {
        echo '<script>alert("File Lebih Dari 500 kb")</script>';
      } else {
        if (!in_array($imageFileType, ["jpg", "png", "jpeg"])) {
          echo '<script>alert("Tipe File Salah")</script>';
        } else {
          // Menghapus file gambar lama
          unlink($target_dir . $selects["image"]);

          // Upload file gambar baru
          move_uploaded_file($_FILES["upgambar"]["tmp_name"], $target_dir . $imgname);

          // Menambahkan kolom 'image' ke query
          $query .= ", `image`='$imgname'";
        }
      }
    }

    $query .= " WHERE `produk`.`idp`='$id'";

    $result = mysqli_query($con, $query);

    if ($result) {
      echo '<script>alert("Data Berhasil Diubah")</script>';
      echo '<script>window.location.assign("https://www.arthamitrainternasional.com/produk-admin");</script>';
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