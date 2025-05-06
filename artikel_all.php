<?php
require_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <title>Detail</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/fae96b79f4.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <link rel="stylesheet" href="css/artikel-detail.css">
</head>

<body>
  <style>
    .navbar-opaque {
      background-color: transparent;
      /* Ubah dengan warna latar belakang yang diinginkan */
      font-weight: bold;
      transition: background-color 0.3s ease;
      box-shadow: none;
    }

    #navbar-logo-scroll {
      display: none;
    }

    .nav-link {
      color: rgb(255, 255, 255);
      /* Mengubah warna teks menjadi putih */
    }
  </style>

  <!-- Header -->
  <nav class="navbar navbar-expand-lg sticky-top navbar-opaque nav-navlink ">
    <div class="container nav-paling-atas">

      <a class="navbar-brand" href="#">
        <img src="assets/images/ARMI-putih.png" alt="" width="150" id="navbar-logo">
        <img src="assets/images/armi-logo-item.png" alt="Logo Scroll" id="navbar-logo-scroll" width="150">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav nav-underline ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="goverment.html">Government</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="https://arthamitrainternasional.com/goverment">Tentang</a></li>
              <li><a class="dropdown-item" href="https://arthamitrainternasional.com/produk">Produk</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://arthamitrainternasional.com/main">Corporate</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://klik4it.com/">Commerce</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://arthamitrainternasional.com/kontak">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- hero -->
  <section id="hero">
    <div class="aaaaaaaaaaaaaa">
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <?php
          $select = mysqli_query($con, 'select * from artikel where status = "0" order by tanggal DESC limit 3');
          $counter = 0;
          while ($data = mysqli_fetch_array($select)) {
            $active = ($counter == 0) ? 'active' : ''; // Tandai satu elemen sebagai active
          ?>
            <div class="carousel-item <?= $active ?> image-carousel">

              <img src="assets/gambar/<?= $data['gambar'] ?>" class="car-cnt d-block w-100" alt="...">

            </div>
          <?php
            $counter++;
          }
          ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <i class="fas fa-arrow-left"></i> <!-- Menggunakan ikon panah kiri FontAwesome -->
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <i class="fas fa-arrow-right"></i> <!-- Menggunakan ikon panah kanan FontAwesome -->
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

  <section id="artikel-1">
    <div class="container mt-5">
      <div class="row row-md-3">
        <?php
        $hitung_artikel = mysqli_num_rows(mysqli_query($con, 'select * from artikel where status = "0"'));
        $artikel_per_halaman = 6;
        $total = ceil($hitung_artikel / $artikel_per_halaman);
        $halaman = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($halaman - 1) * $artikel_per_halaman;

        $select = mysqli_query($con, "SELECT * FROM artikel  WHERE STATUS = '0' ORDER BY id DESC LIMIT $offset, $artikel_per_halaman");
        while ($row = mysqli_fetch_array($select)) {
          $trimmed_content = substr($row['konten'], 0, 130); // Menampilkan 100 karakter pertama
        ?>
          <div class="grid-item col-md-4 mb-4">
            <div class="card kartu">
              <img src="assets/gambar/<?= $row['gambar'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title ellipsis-text"><?= $row['judul'] ?></h5>
                <p class="card-text"><?= $trimmed_content ?>...</p>
                <a href="https://www.arthamitrainternasional.com/detail-artikel?id=<?= $row['id'] ?>" class="card-link">
                  Read More >>>
                </a>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>

    <!-- pagination -->
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <?php
        if ($halaman > 1) {
          $previous = $halaman - 1;
        ?>

          <li class="page-item">
            <a class="page-link" href="https://arthamitrainternasional.com/artikel_all?page=<?= $previous ?>" class="btn btn-primary">Sebelumnya</a>
          </li>

        <?php
        }
        for ($i = 1; $i <= $total; $i++) {
        ?>
          <li class="page-item">
            <a class="page-link" href="https://arthamitrainternasional.com/artikel_all?page=<?= $i ?>" class="<?= ($i == $halaman ? 'active' : '') ?>"><?= $i ?></a>
          </li>
        <?php
        }
        if ($halaman < $total) {
          $next = $halaman + 1;
        ?>
          <li class="page-item">
            <a class="page-link" href="https://arthamitrainternasional.com/artikel_all?page=<?= $next ?>" class="btn btn-primary">Berikutnya</a>
          </li>
        <?php
        }
        ?>
      </ul>
    </nav>
  </section>



</body>
<footer id="footer">
  <div class="footer">
    <div class="grid">
      <div class="column">
        <div class="comuns">
          <div class="comunss">
            <img src="assets/images/ARMI-putih.png" alt="" style="width: 70%;">
            <div class="logos">
              <i class="fa-brands fa-square-facebook fa-2xl"></i>
              <i class="fa-brands fa-square-instagram fa-2xl"></i>
              <i class="fa-brands fa-square-twitter fa-2xl"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="column">
        <h5>Menu</h5>
        <div class="garis"></div>
        <div class="ouurs" style="padding:25px">
          <p>Government</p>
          <p>Corporate</p>
          <p>Product</p>
          <p>Articles</p>
          <p>About</p>
          <p>Contact</p>
        </div>
      </div>
      <div class="column">
        <h5>Address</h5>
        <div class="garis"></div>
        <div class="alamat" style="padding:25px">
          <p>Ruko Pangeran Jayakarta 129 Blok C No.33
            JL.Pangeran Jayakarta
            Jakarta Pusat 11110
            Indonesia</p>
        </div>
        <h5>Contact</h5>
        <div class="garis"></div>
        <div class="contact" style="padding:25px">
          <div class="group-telepon">
            <div class="telepon">
              <p class="telepon-text">+62 21 612 0866</p>
            </div>
          </div>
          <div class="group-mail">
            <div class="mail">
              <p class="mail-text"> <a href="mailto:management@arthamitrainternasional.com">management@arthamitrainternasional.com </a></p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</footer>
<footer id="copyright">
  <p style="color: #ffffff; padding:20px; width:100%; display:flex; justify-content:center;"><b>© 2023 PT. Artha Mitra Internasional</b></p>
</footer>


<script src="js/script.js"></script>
<script>
  AOS.init();
  // JavaScript to toggle transparent navbar based on scroll position
  window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    const scrollPosition = window.scrollY;
    const navbarLogo = document.getElementById('navbar-logo');
    const navbarLogoScroll = document.getElementById('navbar-logo-scroll');
    const navbarLinks = document.querySelectorAll('.navbar-nav .nav-link');


    if (scrollPosition === 0) {
      navbar.classList.add('navbar-opaque');
      navbarLogo.style.display = 'block'; // Tampilkan logo default
      navbarLogoScroll.style.display = 'none'; // Sembunyikan logo scroll
      navbarLinks.forEach(link => {
        link.style.color = ''; // Mengubah warna teks menjadi putih
      });
    } else {
      navbar.classList.remove('navbar-opaque');
      navbarLogo.style.display = 'none'; // Sembunyikan logo default
      navbarLogoScroll.style.display = 'block'; // Tampilkan logo scroll
      navbarLinks.forEach(link => {
        link.style.color = 'black'; // Mengembalikan warna teks ke default (atau sesuai style CSS)
      });
    }
  });

  // carousel button
  document.addEventListener('DOMContentLoaded', function() {
    const carouselControlPrev = document.querySelector('.carousel-control-prev');
    const carouselControlNext = document.querySelector('.carousel-control-next');

    // Default opacity saat halaman dimuat
    carouselControlPrev.style.opacity = '0';
    carouselControlNext.style.opacity = '0';

    // Menambahkan event listener pada carousel untuk mendeteksi pergerakan kursor
    document.querySelector('#carouselExampleIndicators').addEventListener('mousemove', function(e) {
      // Mendapatkan posisi horizontal kursor relatif terhadap carousel
      const mouseX = e.pageX - this.offsetLeft;

      // Mengatur kondisi untuk menampilkan panah kanan atau kiri
      if (mouseX < this.offsetWidth / 2) {
        // Jika kursor di sebelah kiri carousel, tampilkan panah kiri
        carouselControlPrev.style.opacity = '1';
        carouselControlNext.style.opacity = '0';
      } else {
        // Jika kursor di sebelah kanan carousel, tampilkan panah kanan
        carouselControlPrev.style.opacity = '0';
        carouselControlNext.style.opacity = '1';
      }
    });

    // Menambahkan event listener saat kursor keluar dari area carousel
    document.querySelector('#carouselExampleIndicators').addEventListener('mouseleave', function() {
      // Mengatur opacity kembali menjadi default saat kursor keluar dari area carousel
      carouselControlPrev.style.opacity = '0';
      carouselControlNext.style.opacity = '0';
    });
  });
</script>

</html>