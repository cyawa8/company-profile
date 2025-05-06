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
$query = "select * from partner";
$select = mysqli_query($con, $query);
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
  <title>Partner</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/fae96b79f4.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/Chart.js/Chart.js"></script>
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <Link href="css/partner.css" rel="stylesheet">
  </Link>

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
            <a class="nav-link" aria-current="produk-admin" href="https://www.arthamitrainternasional.com/produk-admin">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#  ">Partner</a>
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
    <h2>List Partner</h2>
    <div class="table-responsive">
      <table class="table" id="dataTable" width="100%" cellspacing="0">
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahpartner">Tambah</button>
        <thead>
          <tr>
            <th>no</th>
            <th>Nama</th>
            <th>Logo Partner</th>
            <th>Tanggal</th>
            <th>Solution</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $sql = mysqli_query($con, "select * from partner");
          while ($data = mysqli_fetch_array($sql)) {
            $id = $data['id'];
            $nama = $data['nama'];
            $image = $data['image'];
            $tanggal = $data['tanggal'];
            $solution = $data['solution'];
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $nama ?></td>
              <td><?= $image ?></td>
              <td><?= $tanggal ?></td>
              <td><?= $solution ?></td>
              <td><a href="#ubahs<?= $id ?>" data-bs-toggle="modal">Ubah</a> || <a href="https://www.arthamitrainternasional.com/hapuspartner?idp=<?= $idp ?>">Hapus</a></td>
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
    <div class="modal fade" id="tambahpartner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="POST" enctype="multipart/form-data">

            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Partner</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="mb-3">
                <label for="title">Partner:</label>
                <input type="Text" class="form-control" id="partner" name="partner" placeholder="Nama Partner" required>
              </div>

              <div class="mb-3">
                <label for="title">Logo Partner:</label>
                <input type="file" class="form-control" id="gmbr" name="gmbr" required>
              </div>

              <div class="mb-3">
                <label for="title">Tanggal:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Upload" required>
              </div>

              <div class="mb-3">
                <label for="title">Solution:</label>
                <select class="form-select" aria-label="Default select example" name="solution">
                  <option selected>Pilih Solution</option>
                  <option value="infrastructure-series">Infrastructure Series</option>
                  <option value="virtualization">Virtualization</option>
                  <option value="information-security">Information Security</option>
                  <option value="information-management">Information Management</option>
                  <option value="business-continuity">Business Continuity</option>
                  <option value="visual-and-display">Visual & Display</option>
                  <option value="network-optimization">Network Optimization</option>
                  <option value="enterprise-mobility-management">Enterprise Mobility Management</option>
                </select>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submitpartner">Tambah Produk</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php


  if (isset($_POST['submitpartner'])) {
    $partner = $_POST['partner'];
    $tanggal = $_POST['tanggal'];
    $solution = $_POST['solution'];

    $target_dir = "assets/gambar/";
    $nama_file = basename($_FILES["gmbr"]["name"]);
    $target_file = $target_dir . $nama_file;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imagesize = $_FILES["gmbr"]["size"];
    $random = generaterandomstring(20);
    $imgname =  $random . "." . $imageFileType;

    if ($imagesize > 500000) {
      echo '<script>alert("File Lebih Dari 500 kb")</script>';
    } else {
      if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo '<script>alert("Tipe File Salah")</script>';
      } else {
        move_uploaded_file($_FILES["gmbr"]["tmp_name"], $target_dir . $imgname);

        $query = "INSERT INTO `partner`(`nama`, `image`, `tanggal`, `solution`) VALUES ('$partner', '$imgname', '$tanggal', '$solution')";
        $insert = mysqli_query($con, $query);
        if ($insert) {
          echo '<script>alert("Partner Berhasil Ditambahkan")</script>';
          echo '<script>window.location.assign("partner");</script>';
        } else {
          echo '<script>alert("Partner Gagal Ditambahkan")</script>';
          echo 'Error: ' . mysqli_error($con);
        }
      }
    }
  } else {
  }
  ?>

  <!-- modal ubah data partner -->
  <?php
  $i = 1;
  $sql = mysqli_query($con, "select * from partner");
  while ($data = mysqli_fetch_array($sql)) {
    $id = $data['id'];
    $nama = $data['nama'];
    $image = $data['image'];
    $tanggal = $data['tanggal'];
    $solution = $data['solution'];
  ?>

    <div class="card-header py-0">
      <div class="modal fade" id="ubahs<?= $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">

              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Partner</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <div class="mb-3">
                  <label for="title">Partner:</label>
                  <input type="Text" class="form-control" id="partner" name="partner" placeholder="<?= $nama ?>" value="<?= $nama ?>" required>
                  <input type="hidden" class="form-control" id="id" name="id" placeholder="<?= $id ?>" value="<?= $id ?>">
                </div>

                <div class="fotoprofil d-flex">
                  <label for="file-input" class="profile-image-container col-md-4">
                    <div class="gambar">
                      <img src="assets/gambar/<?= $image ?>" alt="Profile Image" class="profile-image" id="profile-image" name="gambarrr">
                    </div>
                  </label>
                  <input type="file" class="form-control col-md-8" id="file-input" accept=".png, .jpg, .jpeg" name="upgambar" onchange="previewImage(this);">
                </div>

                <div class="mb-3">
                  <label for="title">Tanggal:</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Upload" value="<?php echo $tanggal; ?>" required>
                </div>

                <div class="mb-3">
                  <label for="title">Solution:</label>
                  <select class="form-select" aria-label="Default select example" name="solution">
                    <option value="<?= $solution ?>" selected><?= $solution ?></option>
                    <option value="infrastructure-series">Infrastructure Series</option>
                    <option value="virtualization">Virtualization</option>
                    <option value="information-security">Information Security</option>
                    <option value="information-management">Information Management</option>
                    <option value="business-continuity">Business Continuity</option>
                    <option value="visual-and-display">Visual & Display</option>
                    <option value="network-optimization">Network Optimization</option>
                    <option value="enterprise-mobility-management">Enterprise Mobility Management</option>
                  </select>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submitubahpartner">Ubah Produk</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  <?php
  }
  if (isset($_POST['submitubahpartner'])) {
    $partner = $_POST['partner'];
    $tanggal = $_POST['tanggal'];
    $solution = $_POST['solution'];
    $idpt = $_POST['id'];

    $target_dir = "assets/gambar/";
    $nama_file = basename($_FILES["upgambar"]["name"]);
    $target_file = $target_dir . $nama_file;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imagesize = $_FILES["upgambar"]["size"];
    $random = generaterandomstring(20);
    $imgname = $random . "." . $imageFileType;

    $query = "UPDATE `partner` SET `nama`='$partner', `tanggal`='$tanggal', `solution`='$solution'";
    $select = mysqli_query($con, "select * from partner");
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

    $query .= " WHERE `id`='$idpt'";

    $result = mysqli_query($con, $query);

    if ($result) {
      echo $query;
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