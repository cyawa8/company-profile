<?php
require_once "connection.php";
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <title>Goverment Product</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/fae96b79f4.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <link rel="icon" href="assets/images/logoARMI.png" type="image/x-icon">
  <link rel="stylesheet" href="css/produk.css">
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
  <header>
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
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="goverment">Government</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="https://www.arthamitrainternasional.com/goverment">Tentang</a></li>
                <li><a class="dropdown-item" href="https://www.arthamitrainternasional.com/produk">Produk</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.arthamitrainternasional.com/main">Corporate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://klik4it.com/">Commerce</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.arthamitrainternasional.com/kontak">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="jumbotron">
      <img src="assets/images/jumbotron.jpg" alt="">
      <div class="textjumbotron">
        <h1><b>Lingkup Bisnis</b></h1>
      </div>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide container mt-4 mb-5 content-produk" data-bs-ride="carousel">
      <div class="carousel-indicators">

        <?php
        $numSlides = 5; // Jumlah slide
        $numDataPerSlide = 4; // Jumlah data per slide
        $numData = 20; // Jumlah data total

        for ($i = 0; $i < $numSlides; $i++) {
          $activeClass = ($i == 0) ? 'active' : '';
        ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i ?>" class="<?= $activeClass ?>" aria-label="Slide <?= $i + 1 ?>"></button>
        <?php
        }
        ?>
      </div>
      <div class="carousel-inner">
        <?php
        for ($i = 0; $i < $numSlides; $i++) {
          $activeClass = ($i == 0) ? 'active' : '';
        ?>
          <div class="carousel-item <?= $activeClass ?>">
            <div class="row">
              <?php
              $offset = $i * $numDataPerSlide;
              $query = mysqli_query($con, "SELECT * FROM kategori LIMIT $offset, $numDataPerSlide");
              while ($kategori = mysqli_fetch_array($query)) {
                // Ambil produk berdasarkan kategori
                $kategori_id = $kategori['id'];
                $produk_query = mysqli_query($con, "SELECT * FROM produk WHERE kategori = $kategori_id");
              ?>
                <div class="col-md-12">
                  <div class="block-item">
                    <p>
                      <a class="kategori-btn w-100" data-bs-toggle="collapse" href="#collapseExample<?= $kategori['id'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample<?= $kategori['id'] ?>" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
                        <?= $kategori['namak'] . " " . $kategori['deskripsi'] ?>
                      </a>
                    </p>
                    <div class="collapse" id="collapseExample<?= $kategori['id'] ?>">
                      <div class="card card-body">
                        <h5>Produk dalam kategori <?= $kategori['namak'] ?>:</h5>
                        <div class="row">
                          <?php
                          // Tampilkan daftar produk
                          while ($produk = mysqli_fetch_array($produk_query)) {
                          ?>

                            <div class="col-sm-6 col-md-3 mb-3 px-4" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
                              <div class="card px-2" style="width: 100%;">
                                <div class="img-box">
                                  <img src="assets/gambar/<?php echo $produk['image'] ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                  <p class="card-text"><?= $produk['nama'] ?></p>
                                </div>
                              </div>
                            </div>

                          <?php
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>



  </main>

  <!--footer-->
  <footer id="footer">
    <div class="footer">
      <div class="grid">
        <div class="column">
          <div class="comuns">
            <div class="comunss">
              <img src="assets/images/ARMI-putih.png" alt="" style="width: 70%;">
              <div class="logos">
                <a href="https://www.facebook.com/?locale=id_ID"><i class="fa-brands fa-square-facebook fa-2xl text-white"></i></a>
                <a href="https://www.instagram.com"><i class="fa-brands fa-square-instagram fa-2xl text-white"></i></a>
                <a href="https://twitter.com/?lang=id"><i class="fa-brands fa-square-twitter fa-2xl text-white"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <h5><b>Menu</b></h5>
          <div class="garis"></div>
          <div class="ouurs" style="padding:25px">
            <a href="https://www.arthamitrainternasional.com/goverment">
              <p>Government</p>
            </a>
            <a href="https://www.arthamitrainternasional.com/main">
              <p>Corporate</p>
            </a>
            <a href="https://www.arthamitrainternasional.com/product">
              <p>Product</p>
            </a>
            <a href="https://www.arthamitrainternasional.com/artikel_all">
              <p>Articles</p>
            </a>
            <a href="https://www.arthamitrainternasional.com/aboutus">
              <p>About</p>
            </a>
            <a href="https://www.arthamitrainternasional.com/kontak">
              <p>Contact</p>
            </a>
          </div>
        </div>
        <div class="column">
          <h5><b>Address</b></h5>
          <div class="garis"></div>
          <div class="alamat" style="padding:25px">
            <p>Ruko Pangeran Jayakarta 129 Blok C No.33
              JL.Pangeran Jayakarta
              Jakarta Pusat 11110
              Indonesia</p>
          </div>
          <h5><b>Contact</b></h5>
          <div class="garis"></div>
          <div class="contact" style="padding:25px">
            <div class="group-telepon">
              <div class="telepon" style="text-align: center;">
                <a href="tel:+62 21 612 0866">+62 21 612 0866</a>
              </div>
            </div>
            <div class="group-mail">
              <div class="mail">
                <a href="mailto:management@klik4it.com">management@klik4it.com </a>
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
  </script>
</body>

</html>