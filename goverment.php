<?php
require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <title>Goverment</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/fae96b79f4.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="js/Chart.js/Chart.js"></script>
  <link rel="stylesheet" href="css/goverment.css">

  <head>
    <!-- Link Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  </head>
  <!--Logo Title Bar-->
  <link rel="icon" href="assets/images/logoARMI.png" type="image/x-icon">
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
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="https://www.arthamitrainternasional.com/goverment">Government</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Tentang</a></li>
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

  <!-- hero -->
  <section id="hero">
    <div class="">
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/images/bangunan.jpg" class="car-cnt d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <!-- <img src="assets/images/bangunan.jpg" class="car-cnt d-block w-100" alt="..."> -->
            <video src="assets/video/video1.mp4" class="car-cnt d-block w-100" autoplay muted loop></video>
          </div>
          <div class="carousel-item">
            <!-- <img src="assets/images/bangunan.jpg" class="car-cnt d-block w-100" alt="..."> -->
            <video src="assets/video/video2.mp4" class="car-cnt d-block w-100" autoplay muted loop></video>
          </div>
        </div>
        <div class="overlay"></div>
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

  <section id="ttgkami">
    <div class="container s-0012">
      <div class="tentang row d-flex">
        <div class="col-md-6">
          <div class="ttgkamititle">
            <h2 style="margin-right: 10px;" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom"><b>Tentang</b></h2>
            <h2 style="color: #088395;" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom"><b>Kami</b></h2>
          </div>
          <div class="ttgkami-cntn" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
            <p>PT. Artha Mitra Internasional merupakan entitas yang berdedikasi dalam menyediakan solusi komprehensif di ranah teknologi, yang meliputi penjualan perangkat komputer dan beragam layanan TI.</p>
            <p>Kami tidak hanya sekadar menjual produk, namun juga turut serta dalam mendampingi berbagai entitas bisnis, mulai dari individu hingga korporasi, untuk mengkaji dampak serta mempercepat pertumbuhan usaha mereka. Pendekatan kami terfokus pada analisis mendalam terhadap dinamika bisnis, memungkinkan penyesuaian yang dinamis dan tepat guna sesuai dengan kebutuhan pasar global yang terus berkembang.</p>
          </div>
        </div>
        <div class="col-md-6 visimisi">
          <div class="row">
            <div class="col-md-12">
              <div class="visi">
                <h3 style="color: #088395;" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom"><b>VISI</b></h3>
                <p data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">kami membantu organisasi untuk tumbuh dalam teknologi</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="misi">
                <h3 style="color:  #088395;" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom"><b>MISI</b></h3>
                <p data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">menawarkan solusi inovasi dalam bidang teknologi informasi untuk meningkatkan bisnis organisasi</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section id="mengapa" class="mt-5 mb-5">
    <div class="container">
      <div class="judul">
        <h3 style="color:  #088395;" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom"><b>Mengapa Kami</b></h3>
      </div>
      <div class="s03">
        <div class="grid-item">
          <div class="imagesss" style=" display: flex; justify-content: center;">
            <img src="assets/images/1-01.png" alt="" style="position: absolute; z-index: 999; width: auto; height: 105px;" data-aos="zoom-in-up" data-aos-anchor-placement="bottom-bottom">
          </div>
          <div class="itemasd" style="position: relative; margin-top: 35%; background-color: #00cae9;">
            <div class="title" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
              <h4>Kualitas Terjamin</h4>
            </div>
            <div class="text" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
              <p>Kami menyediakan hanya prouk dan layanan berkualitas tertinggi yang telah diuji dan terbukti</p>
            </div>
          </div>
        </div>

        <div class="grid-item">
          <div class="imagesss" style=" display: flex; justify-content: center;">
            <img src="assets/images/2-01.png" alt="" style="position: absolute; z-index: 999; width: auto; height: 105px;" data-aos="zoom-in-up" data-aos-anchor-placement="bottom-bottom">
          </div>
          <div class="itemasd" style="position: relative; margin-top: 35%;  background-color: #00aec9;">
            <div class="title" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
              <h4>Pengalaman Luar Biasa</h4>
            </div>
            <div class="text" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
              <p>Tim kami telah melayani berbagai sektor, menciptakan solusi yang dibutuhkan oleh pelanggan</p>
            </div>
          </div>
        </div>

        <div class="grid-item">
          <div class="imagesss" style=" display: flex; justify-content: center;">
            <img src="assets/images/3-01.png" alt="" style="position: absolute; z-index: 999; width: auto; height: 105px;" data-aos="zoom-in-up" data-aos-anchor-placement="bottom-bottom">
          </div>
          <div class="itemasd" style="position: relative; margin-top: 35%; background-color: #208a9b;">
            <div class="title" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
              <h4>Dukungan Responsif</h4>
            </div>
            <div class="text" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
              <p>Tim layanan pelanggan dan dukngan teknis yang reponsif siap membantu anda kapan saja</p>
            </div>
          </div>
        </div>

        <div class="grid-item">
          <div class="imagesss" style=" display: flex; justify-content: center;">
            <img src="assets/images/4-01.png" alt="" style="position: absolute; z-index: 999; width: auto; height: 105px;" data-aos="zoom-in-up" data-aos-anchor-placement="bottom-bottom">
          </div>
          <div class="itemasd" style="position: relative; margin-top: 35%; background-color:rgb(0, 88, 102);">
            <div class="title" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
              <h4>Komitmen harga</h4>
            </div>
            <div class="text" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
              <p>Kami menawarkan harga yang kompetitif dan solusi rammah anggaran</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>



  <section id="mitra">
    <!-- <div class="overlays"></div> -->
    <div class="container">
      <div class="marketplace">
        <div class="title-market">
          <h3>Kami Tersedia</h3>
        </div>
        <div class="marketplace-grid">
          <div class="grid-containers">
            <div class="grid-itemss"><img src="assets/images/LPSE.png" alt="" data-aos="fade-right" data-aos-anchor-placement="bottom-bottom"></div>
            <div class="grid-itemss"><img src="assets/images/E-CATALOG.png" alt="" data-aos="fade-left" data-aos-anchor-placement="bottom-bottom"></div>
            <div class="grid-itemss"><img src="assets/images/PADIUMKM.png" alt="" data-aos="fade-right" data-aos-anchor-placement="bottom-bottom"></div>
            <div class="grid-itemss"><img src="assets/images/bizmarket.png" alt="" data-aos="fade-left" data-aos-anchor-placement="bottom-bottom"></div>
          </div>
          <div class="grid-itemss-5"><img src="assets/images/blibli.png" alt="" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"></div>
        </div>
      </div>
    </div>
  </section>

  <section id="market">
    <div class="container wrapp">
      <div class="wrappp">
        <div class="titlemitra">
          <h3 style="color:#088395;" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"><b>Mitra Kami</b></h3>
        </div>

        <div class="grid-container" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
          <?php
          $select = mysqli_query($con, "SELECT * FROM partner limit 6");
          while ($row = mysqli_fetch_array($select)) {
          ?>
            <div class="grid-items">
              <img src="assets/gambar/<?= $row['image'] ?>" alt="Logos" class="logo">
            </div>
          <?php
          }
          ?>
        </div>

        <div class="logo-list">
          <div class="grid-container">
            <?php
            $select = mysqli_query($con, "SELECT * FROM partner LIMIT 18446744073709551615 OFFSET 6");
            while ($row = mysqli_fetch_array($select)) {
            ?>
              <div class="grid-items">
                <img src="assets/gambar/<?= $row['image'] ?>" alt="Logo 1" class="logo">
              </div>
            <?php
            }
            ?>
          </div>
        </div>

        <div class="buttonss">
          <button class="toggle-btn btn-more-cl" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">Selengkapnya >>></button>
        </div>
      </div>
    </div>
  </section>
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
                <a href="mailto:management@arthamitrainternasional.com">management@arthamitrainternasional.com </a>
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


  <script>
    AOS.init();


    const toggleButtons = document.querySelectorAll('.toggle-btn');
    const logoLists = document.querySelectorAll('.logo-list');

    // Loop melalui setiap tombol Selengkapnya dan tambahkan event listener
    toggleButtons.forEach((button, index) => {
      button.addEventListener('click', () => {
        // Toggle tampilan logo-list yang sesuai dengan tombol Selengkapnya yang diklik
        logoLists[index].classList.toggle('show');
        // Ubah teks tombol Selengkapnya menjadi 'Tutup' atau 'Selengkapnya'
        button.textContent = logoLists[index].classList.contains('show') ? 'Tutup' : 'Selengkapnya';
      });
    });
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

</body>

</html>