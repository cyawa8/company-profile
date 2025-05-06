<?php
require_once "connection.php";
if (isset($_SESSION['isloggedin']) != 1) {
  header("location:https://www.arthamitrainternasional.com/login");
  exit();
}
$id = $_SESSION["id"];
$query = "select * from admin where id = $id";
$d = mysqli_query($con, $query);
$select = mysqli_fetch_array($d);
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
  <!-- Custom styles for this template -->
  <link href="css/setting.css" rel="stylesheet">

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
            <a class="nav-link active" href="https://www.arthamitrainternasional.com/dashboard">KLBI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="https://www.arthamitrainternasional.com/produk-admin">Produk</a>
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
              Welcome Admin <?= $select['nama_depan'] ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="https://www.arthamitrainternasional.com/logout">Keluar</a></li>
              <li><a class="dropdown-item" href="#">Setting</a></li>
            </ul>
          </li>
        </span>
      </div>
    </div>
  </nav>

  <section>
    <div class="container">
      <center>
        <h3 class="setting">Setting Profile</h3>
      </center>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="row-md-12 d-flex mt-3">
          <div class="form col-md-7">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Depan</label>
              <input type="text" class="form-control" id="namd" name="namad" value="<?= $select['nama_depan'] ?>" placeholder="<?= $select['nama_depan'] ?>">
              <input type="hidden" class="form-control" id="id" name="id" value="<?= $select['id'] ?>">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Belakang</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="namab" value="<?= $select['nama_belakang'] ?>" placeholder="<?= $select['nama_belakang'] ?>">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Username</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $select["username"] ?>" name="username" placeholder="<?= $select["username"] ?>">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Kontak</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $select['kontak'] ?>" name="kontak" placeholder="<?= $select['kontak'] ?>">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" value="<?= $select['password'] ?>" placeholder="<?= $select['password'] ?>">
            </div>

            <div class="mb-3 form-group">
              <input type="checkbox" onClick="myFunctions()">&nbsp;&nbsp; show password
            </div>
          </div>
          <div class="fotoprofil col-md-5 d-flex">
            <label for="file-input" class="profile-image-container">
              <div class="gambar">
                <img src="assets/gambar/<?= $select["profil"] ?>" alt="Profile Image" class="profile-image" id="profile-image" name="gambarrr">
                <div class="hover-text"><i class="fa-regular fa-pen-to-square fa-bounce large-icon"></i></div>
              </div>
              <div class="overlay"></div>
            </label>
            <input type="file" id="file-input" name="upgambar" accept=".png, .jpg, .jpeg" value="<?= $select['profil'] ?>" onchange="previewImage(this);">
          </div>
        </div>
        <button type="submit" class="btn btn-warning mb-5" name="submitkategori">Simpan</button>
      </form>
    </div>
  </section>
  </div>

  <?php
  if (isset($_POST['submitkategori'])) {
    $namad = $_POST['namad'];
    $namab = $_POST['namab'];
    $username = $_POST['username'];
    $kontak = $_POST['kontak'];
    $password = $_POST['password'];

    $id = $_POST['id'];
    $hashed = password_hash($password, PASSWORD_BCRYPT);

    $target_dir = "assets/gambar/";
    $nama_file = basename($_FILES["upgambar"]["name"]);
    $target_file = $target_dir . $nama_file;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imagesize = $_FILES["upgambar"]["size"];
    $random = generaterandomstring(20);
    $imgname =  "";
    $imgname = $random . "." . $imageFileType;
    $query = "UPDATE `admin` SET `username`='$username',`kontak`='$kontak',`password`='$hashed',`nama_depan`='$namad',`nama_belakang`='$namab' WHERE `id`='$id'";
    if ($nama_file != '') {
      if ($imagesize > 10000000) {
        echo '<script>alert("File Lebih Dari 500 kb")</script>';
      } else {
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
          echo '<script>alert("Tipe File Salah")</script>';
        } else {

          unlink($target_dir . $select["profil"]);
          move_uploaded_file($_FILES["upgambar"]["tmp_name"], $target_dir . $imgname);
          $query = "UPDATE `admin` SET `profil` = '$imgname' WHERE `id`='$id'";
          $insert = mysqli_query($con, $query);
          if ($insert) {
            echo '<script>alert("Data Berhasil Diubah")</script>';
            echo '<script>window.location.assign("https://www.arthamitrainternasional.com/setting");</script>';
          } else {
            echo '<script>alert("Data Gagal Diubah")</script>';
          }
        }
      }
    }
    $insert = mysqli_query($con, $query);
    if ($insert) {
      echo '<script>alert("Data Berhasil Diubah")</script>';
      echo '<script>window.location.assign("https://www.arthamitrainternasional.com/setting");</script>';
    } else {
      echo '<script>alert("Data Gagal Diubah")</script>';
    }
  } else {
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
    function myFunctions() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

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