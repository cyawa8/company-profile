<?php
ob_start();
require_once "connection.php";
include "auth.php";

if (isset($_GET['deactivate'])) {
  $id = $_GET['deactivate'];

  // Cek role dari user yang ingin dinonaktifkan
  $checkRoleQuery = $con->prepare("SELECT role FROM admin WHERE id = ?");
  $checkRoleQuery->bind_param("i", $id);
  $checkRoleQuery->execute();
  $roleResult = $checkRoleQuery->get_result()->fetch_assoc();
  $role = $roleResult['role'];

  // Jika user adalah admin, tolak
  if ($role === 'admin') {
    echo "<script>
            alert('Akun dengan role admin tidak bisa dinonaktifkan.');
            window.location.href = 'https://www.arthamitrainternasional.com/user';
          </script>";
    exit();
  } else {
    $deactivateQuery = $con->prepare("UPDATE admin SET status = '1' WHERE id = ?");
    $deactivateQuery->bind_param("i", $id);
    if ($deactivateQuery->execute()) {
      header("Location: https://www.arthamitrainternasional.com/user?status=deactivated");
      exit();
    } else {
      echo "<script>alert('Gagal menonaktifkan akun.');</script>";
    }
  }
}


// Mengaktifkan akun jika ada permintaan untuk mengaktifkan
if (isset($_GET['activate'])) {
  $id = $_GET['activate'];

  $activateQuery = $con->prepare("UPDATE admin SET status = '0' WHERE id = ?");
  $activateQuery->bind_param("i", $id);
  if ($activateQuery->execute()) {
    header("Location: https://www.arthamitrainternasional.com/user?status=activated");
    exit();
  } else {
    echo "<script>alert('Gagal mengaktifkan akun.');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Favicon -->
  <link rel="icon" href="assets/images/logoARMI.png" type="image/x-icon">

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/fae96b79f4.js" crossorigin="anonymous"></script>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- DataTables -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="vendor/jquery/jquery.min.js"></script>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-transperency">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="assets/images/armi-logo-item.png" alt="" width="150"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="https://www.arthamitrainternasional.com/logindashboard">KLBI</a></li>
          <li class="nav-item"><a class="nav-link" href="https://www.arthamitrainternasional.com/produk-admin">Produk</a></li>
          <li class="nav-item"><a class="nav-link" href="https://www.arthamitrainternasional.com/partner">Partner</a></li>
          <li class="nav-item"><a class="nav-link" href="https://www.arthamitrainternasional.com/artikel">Artikel</a></li>
          <li class="nav-item"><a class="nav-link active" href="https://www.arthamitrainternasional.com/user">User</a></li>
        </ul>
        <span class="navbar-text">
          <li class="nav dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              Welcome Admin <?= htmlspecialchars($_SESSION["nama_lengkap"]) ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/logout">Keluar</a></li>
              <li><a class="dropdown-item" href="/setting">Setting</a></li>
            </ul>
          </li>
        </span>
      </div>
    </div>
  </nav>

  <!-- Dashboard Content -->
  <div class="mt-3 container">
    <h2>List Admin Aktif</h2>
    <div class="table-responsive">
      <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahuser">Tambah</button>
      <table class="table" id="dataTable" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Tanggal Dibuat</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $result = $con->query("SELECT * FROM admin WHERE status = '0'");

          if ($result && $result->num_rows > 0):
            while ($data = $result->fetch_assoc()):
              $id = $data['id'];
              $nama = $data['nama_depan'] . " " . $data['nama_belakang'];
              $username = $data['username'];
              $status = $data['status']; // pastikan jadi integer
              $tanggal = $data['tanggal'];
          ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($nama) ?></td>
                <td><?= htmlspecialchars($username) ?></td>
                <td><?= htmlspecialchars($tanggal) ?></td>
                <td>
                  <?php
                  if ($status === '0') {
                    echo '<span class="badge bg-success">Active</span>';
                  } elseif ($status === '1') {
                    echo '<span class="badge bg-danger">Inactive</span>';
                  }
                  ?>
                </td>
                <td>
                  <a href="#updatek<?= $id ?>" data-bs-toggle="modal">Ubah</a> ||
                  <a href="https://www.arthamitrainternasional.com/user?deactivate=<?= $id ?>" class="text-warning" onclick="return confirm('Yakin ingin menonaktifkan akun ini?')">InActive</a>

                </td>
              </tr>
            <?php
            endwhile;
          else:
            ?>
            <tr>
              <td colspan="6" class="text-center">Tidak ada admin aktif.</td>
            </tr>
          <?php endif; ?>

        </tbody>
      </table>
    </div>

    <h2>List Admin Non-Aktif</h2>
    <div class="table-responsive">
      <table class="table" id="dataTableInactive" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Tanggal Dibuat</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $resultInactive = $con->query("SELECT * FROM admin WHERE status = '1'");

          while ($data = $resultInactive->fetch_assoc()):
            $id = $data['id'];
            $nama = $data['nama_depan'] . " " . $data['nama_belakang'];
            $username = $data['username'];
            $status = $data['status'];
            $tanggal = $data['tanggal'];
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= htmlspecialchars($nama) ?></td>
              <td><?= htmlspecialchars($username) ?></td>
              <td><?= htmlspecialchars($tanggal) ?></td>
              <td>
                <?php
                if ($status === '0') {
                  echo '<span class="badge bg-success">Active</span>';
                } elseif ($status === '1') {
                  echo '<span class="badge bg-danger">Inactive</span>';
                }
                ?>
              </td>
              <td>
                <a href="https://www.arthamitrainternasional.com/user?activate=<?= $id ?>" class="text-success">Active</a>

              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Tambah User -->
  <div class="modal fade" id="tambahuser" tabindex="-1" aria-labelledby="tambahuserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post" action=""> <!-- Arahkan ke handler tambah -->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahuserLabel">Tambah User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label>Nama Depan</label>
              <input type="text" name="nama_depan" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Nama Belakang</label>
              <input type="text" name="nama_belakang" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Username</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Role</label>
              <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
                <option value="viewer">Viewer</option>
              </select>
            </div>
            <div class="mb-3">
              <label>Kontak</label>
              <input type="text" name="kontak" class="form-control" required>
            </div>

          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button class="btn btn-primary" type="submit" name="submituser">Tambah</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php
  // Modal Ubah untuk setiap user
  $resultAll = $con->query("SELECT * FROM admin");
  while ($user = $resultAll->fetch_assoc()):
  ?>
    <div class="modal fade" id="updatek<?= $user['id'] ?>" tabindex="-1" aria-labelledby="updateLabel<?= $user['id'] ?>" aria-hidden="true">
      <div class="modal-dialog">
        <form method="post" action=""> <!-- Arahkan ke handler ubah -->
          <input type="hidden" name="id" value="<?= $user['id'] ?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="updateLabel<?= $user['id'] ?>">Ubah User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label>Nama Depan</label>
                <input type="text" name="nama_depan" value="<?= htmlspecialchars($user['nama_depan']) ?>" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Nama Belakang</label>
                <input type="text" name="nama_belakang" value="<?= htmlspecialchars($user['nama_belakang']) ?>" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Password (kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control">
              </div>
              <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control" required>
                  <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                  <option value="staff" <?= $user['role'] === 'staff' ? 'selected' : '' ?>>Staff</option>
                  <option value="viewer" <?= $user['role'] === 'viewer' ? 'selected' : '' ?>>Viewer</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button class="btn btn-success" type="update">Ubah</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  <?php
  endwhile;

  if (isset($_POST['submituser'])) {
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    // Cek jika username sudah digunakan
    $checkUsername = $con->prepare("SELECT id FROM admin WHERE username = ?");
    $checkUsername->bind_param("s", $username);
    $checkUsername->execute();
    $checkResult = $checkUsername->get_result();

    if ($checkResult->num_rows > 0) {
      echo "<script>alert('Username sudah digunakan.');</script>";
    } else {
      // Cek jika role admin sudah ada
      if ($role === 'superadmin') {
        $checkAdmin = $con->query("SELECT COUNT(*) as total_admin FROM admin WHERE role = 'admin'");
        $adminCount = $checkAdmin->fetch_assoc()['total_admin'];
        if ($adminCount >= 1) {
          echo "<script>alert('Sudah ada akun dengan role admin. Hanya boleh satu.');</script>";
          exit();
        }
      }

      // Jika lolos semua validasi, tambahkan user
      $insertUser = $con->prepare("INSERT INTO admin (nama_depan, nama_belakang, username, password, role, status, tanggal) VALUES (?, ?, ?, ?, ?, '1', NOW())");
      $insertUser->bind_param("sssss", $nama_depan, $nama_belakang, $username, $password, $role);
      if ($insertUser->execute()) {
        header("Location: https://www.arthamitrainternasional.com/user?status=success");
        exit();
      } else {
        echo "<script>alert('Gagal menambahkan user.');</script>";
      }
    }
  }


  // Misalnya pada bagian update user
  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $role = $_POST['role'];

    // Ambil role lama
    $getUser = $con->prepare("SELECT role FROM admin WHERE id = ?");
    $getUser->bind_param("i", $id);
    $getUser->execute();
    $oldRole = $getUser->get_result()->fetch_assoc()['role'];

    // Jika user ini adalah admin, jangan izinkan ubah role
    if ($oldRole === 'admin' && $role !== 'admin') {
      echo "<script>alert('Role admin tidak boleh diubah.');</script>";
    } else {
      $update = $con->prepare("UPDATE admin SET nama_depan = ?, nama_belakang = ?, role = ? WHERE id = ?");
      $update->bind_param("sssi", $nama_depan, $nama_belakang, $role, $id);
      if ($update->execute()) {
        header("Location: user.php?status=updated");
        exit();
      } else {
        echo "<script>alert('Gagal mengubah user.');</script>";
      }
    }
  }


  if (isset($_GET['status']) && $_GET['status'] === 'deactivated') {
    echo "<script>
    alert('Akun berhasil dinonaktifkan.');
  </script>";
  }

  if (isset($_GET['status']) && $_GET['status'] === 'activated') {
    echo "<script>
    alert('Akun berhasil diaktifkan kembali.');
  </script>";
  }
  ?>


  <!-- Scripts -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="js/datatables-demo.js"></script>
  <script src="js/script.js"></script>

</body>
<?php
ob_end_flush();
?>

</html>