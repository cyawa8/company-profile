<?php
require_once 'connection.php';
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
  <title>ARTHA MITRA INTERNASIONAL</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/fae96b79f4.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

  <script type="text/javascript" src="js/Chart.js/Chart.js"></script>
  <link rel="stylesheet" href="css/index.css">
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
  <nav class="navbar navbar-expand-lg sticky-top navbar-opaque nav-navlink">
    <div class="container-fluid" style="width: 80%;">

      <a class="navbar-brand" href="#">
        <img src="assets/images/ARMI-putih.png" alt="" width="120" id="navbar-logo">
        <img src="assets/images/armi-logo-item.png" alt="Logo Scroll" id="navbar-logo-scroll" width="120">
      </a>

      <button class="navbar-toggler ml-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav nav-underline ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="https://arthamitrainternasional.com/goverment">Government</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="https://www.arthamitrainternasional.com/goverment">Tentang</a></li>
              <li><a class="dropdown-item" href="https://arthamitrainternasional.com/produk">Produk</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Corporate</a>
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

  <!--section #1 -->
  <!-- Video container -->

  <section id="awal">
    <div class="container h-100">
      <div class="video-hero">
        <video src="assets/video/logo horizontal.mp4" class="fullscreen-bg__video" autoplay muted loop></video>
      </div>
      <div class="row h-100">
        <div class="overlay"></div>
      </div>
    </div>
  </section>



  <!--section #2-->
  <section id="content-chart">
    <div class="container section-content-chart">

      <div class="section-2-contents col-6" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
        <center>
          <h2 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            Today's Technological<br><b class="text-content-chart" style="color: #088395;">Solutions</b>
          </h2>
        </center>
      </div>
      <div class=" section-2-content col-6" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
        <div class="titlez">
          <h2>Introduce</h3>
            <h3 style="color: #088395;"><b>Artha Mitra Internasional</b>
          </h2>
          <div class="line"></div>
        </div>
        <br><br>
        <p style="text-align: justify;">
          We help organizations of all sizes from individuals to companies to analyze business impact and business growth by making dynamic improvements in accordance with global business needs.
        </p>
      </div>

    </div>

  </section>
  <div class="arrow" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
    <i class="fa-solid fa-arrow-down fa-xl"></i>
  </div>

  <!--section #3-->
  <section id="section-3">
    <div class="container s01">
      <div class="angry-grid">
        <div id="item-0" class="gambar-ss" onclick="toggleModal('modal1')" data-text="Virtualization" data-aos="fade-left" data-aos-anchor-placement="bottom-bottom">
          <img src="assets/images/aa.png" alt="" style="max-width: 15%;">
          <span class="hover-text"><b>Infrastructure Series</b></span>
        </div>

        <div id="item-1" class="gambar-ss" onclick="toggleModal('modal2')" data-text="Infrastructure Series" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
          <img src="assets/images/ee.png" alt="" style="max-width: 30%;">
          <span class="hover-text"><b>Virtualization</b></span>
        </div>
        <div id="item-2" class="gambar-ss" onclick="toggleModal('modal3')" data-text="Information Security" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
          <img src="assets/images/dd.png" alt="" style="max-width: 30%;">
          <span class="hover-text"><b>Information Security</b></span>
        </div>
        <div id="item-3" class="gambar-ss" onclick="toggleModal('modal4')" data-text="Information Management" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
          <img src="assets/images/bb.png" alt="" style="max-width: 25%;">
          <span class="hover-text"><b>Information Management</b></span>
        </div>
        <div id="item-7" class="gambar-ss" onclick="toggleModal('modal8')" data-text="Information Management" data-aos="fade-right" data-aos-anchor-placement="bottom-bottom">
          <img src="assets/images/cc.png" alt="" style="max-width: 15%;">
          <span class="hover-text"><b>Business Continuity</b></span>
        </div>
        <div id="item-4" class="gambar-ss" onclick="toggleModal('modal5')" data-text="Business Contiunity" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
          <img src="assets/images/gg.png" alt="" style="max-width: 35%;">
          <span class="hover-text"><b>Network Optimization</b></span>
        </div>
        <div id="item-5" class="gambar-ss" onclick="toggleModal('modal6')" data-text="Network Optimization" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
          <img src="assets/images/ff.png" alt="" style="max-width: 25%;">
          <span class="hover-text"><b>Visual & Display</b></span>
        </div>
        <div id="item-6" class="gambar-ss" onclick="toggleModal('modal7')" data-text="Visual And Display" data-aos="fade-right" data-aos-anchor-placement="bottom-bottom">
          <img src="assets/images/hh.png" alt="" style="max-width: 35%;">
          <span class="hover-text"><b>Enterprise Mobility Management</b></span>
        </div>
        <!-- Tambahkan elemen span dengan kelas hover-text dan isikan teks yang ingin ditampilkan saat di-hover -->
        <!-- Sisipkan elemen lainnya dengan struktur yang serupa -->
      </div>
    </div>
  </section>

  <!-- Modal 1 -->
  <div class="modal" id="modal1">
    <div class="modal-content">
      <div class="isi">
        <div class="close" onclick="toggleModal('modal1')">&times;</div>
        <div class="row d-flex card-content">
          <div class="col-md-6 card-texts">
            <h4><b>Infrastructure Series</b></h4>
            <p>World of IT infrastructure is the foundation of computing in the IT world. Which comprises of a collection of physical and virtual resources that will support the entire IT environment; including server, storage and network.Service and the added value of IT is in optimizing infrastructure owned in order to direct positive impact on business profits. Development, testing, operation, monitoring, managing the activities closely in this infrastructure solutions.</p>
            <ul>
              <li>System Infrastructure Section</li>
              <li>Commodity Server And Storage</li>
              <li>Hyper-Converged Infrastructure</li>
              <li>Data Centre Infrastructure Section</li>
              <li>Mechanical Electrical</li>
              <li>Environment Monitoring System</li>
              <li>Cooling System</li>
              <li>Data Center Infrastructure Management</li>
            </ul>
          </div>
          <div class="col-md-6 image-solution">
            <div class="image-kanan">
              <img src="assets/images/logo infrastucture series merah.png" alt="">
            </div>
            <div class="logo-series mt-5">
              <?php
              $select = mysqli_query($con, 'select * from partner where solution = "infrastructure-series"');
              while ($logo = mysqli_fetch_array($select)) {
              ?>
                <img src="assets/gambar/<?= $logo['image'] ?>" alt="">
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="modal2">
    <div class="modal-content">
      <span class="close" onclick="toggleModal('modal2')">&times;</span>
      <div class="row-lg-12 d-flex card-content">
        <div class="col-md-6 card-texts">
          <h4><b>Virtualization</b></h4>
          <p>World of IT infrastructure is the foundation of computing in the IT world. Which comprises of a collection of physical and virtual resources that will support the entire IT environment; including server, storage and network.Service and the added value of IT is in optimizing infrastructure owned in order to direct positive impact on business profits. Development, testing, operation, monitoring, managing the activities closely in this infrastructure solutions.</p>
          <ul>
            <li>System Infrastructure Section</li>
            <li>Commodity Server And Storage</li>
            <li>Hyper-Converged Infrastructure</li>
            <li>Data Centre Infrastructure Section</li>
            <li>Mechanical Electrical</li>
            <li>Environment Monitoring System</li>
            <li>Cooling System</li>
            <li>Data Center Infrastructure Management</li>
          </ul>
        </div>
        <div class="col-md-6 image-solution">
          <div class="image-kanan">
            <img src="assets/images/logo infrastucture series merah.png" alt="">
          </div>
          <div class="logo-series mt-5">
            <?php
            $select = mysqli_query($con, 'select * from partner where solution = "virtualization"');
            while ($logo = mysqli_fetch_array($select)) {
            ?>
              <img src="assets/gambar/<?= $logo['image'] ?>" alt="">
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="modal3">
    <div class="modal-content">
      <span class="close" onclick="toggleModal('modal3')">&times;</span>
      <div class="row d-flex card-content">
        <div class="col-md-6 card-texts">
          <h4><b>Information Security</b></h4>
          <p>The implementation of this solution is supported by a variety of disciplines involved in Information Security include Compliance, data protection, application services, risk management, identity and access management, cyber security, mobility, cloud and BCP planning.</p>
          <ul>
            <li>System Security</li>
            <li>Endpoint Management Section</li>
            <li>Identify Management section</li>
            <li>Data Security</li>
            <li>DLP & IRM Section</li>
            <li>Network Security</li>
            <li>UTM & NGFW</li>
          </ul>
        </div>
        <div class="col-md-6 image-solution">
          <div class="image-kanan">
            <img src="assets/images/logo information security merah.png" alt="">
          </div>
          <div class="logo-series mt-5">
            <?php
            $select = mysqli_query($con, 'select * from partner where solution = "information-security"');
            while ($logo = mysqli_fetch_array($select)) {
            ?>
              <img src="assets/gambar/<?= $logo['image'] ?>" alt="">
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="modal4">
    <div class="modal-content">
      <span class="close" onclick="toggleModal('modal4')">&times;</span>
      <div class="row d-flex card-content">
        <div class="col-md-6 card-texts">
          <h4><b>Information Management</b></h4>
          <p>Data and information is the key to understanding the business and its customers. With a good understanding of information generated from the management and analysis of data, can directly improve business performance and identify new opportunities.</p>
          <p>To that required equipment and devices appropriate to handle massive data growth, ease of data access, management and analysis. In this series solution contained almost all of the scope of information and information cycle that would be handled by the Information Management solutions.</p>
          <ul>
            <li>File and Email Management</li>
            <li>Enterprise File Sharing</li>
            <li>Enterprise Content Management</li>
            <li>Data Copy Management</li>
          </ul>
        </div>
        <div class="col-md-6 image-solution">
          <div class="image-kanan">
            <img src="assets/images/logo information management hijau.png" alt="">
          </div>
          <div class="logo-series mt-5">
            <?php
            $select = mysqli_query($con, 'select * from partner where solution = "information-management"');
            while ($logo = mysqli_fetch_array($select)) {
            ?>
              <img src="assets/gambar/<?= $logo['image'] ?>" alt="">
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="modal5">
    <div class="modal-content">
      <div class="isi">
        <span class="close" onclick="toggleModal('modal5')">&times;</span>
        <div class="row d-flex card-content">
          <div class="col-md-6  card-texts">
            <h4><b>Network Optimization</b></h4>
            <p>Data traffic on the network are now more dynamic, reflecting changes in society to better interpersonal communication, business processing or connectivity when traveling. Mobile lifestyle requires qualified network technology to support it. Network Optimization solution in the series provides comprehensive network services ranging from technology deployment, network transformation and optimization of network traffic, all of which guarantee end-user experience is optimal and the benefits felt by the operator Network.</p>
            <p>Network Optimization solution series was originally aimed at building a network infrastructure that can be coupled with the cloud, social, mobile and analytics. This solution will be able to strengthen the existing network infrastructure so as to be more responsive, flexible, consolidated and supported virtualization environments.</p>
            <ul>
              <li>Application Delivery Controler</li>
              <li>WAN Optimization</li>
              <li>Bandwith Management</li>
              <li>Link Balancer</li>
              <li>Network Monitoring System</li>
            </ul>
          </div>
          <div class="col-md-6 image-solution">
            <div class="image-kanan">
              <img src="assets/images/logo network optimization hijau.png" alt="">
            </div>
            <div class="logo-series mt-5">
              <?php
              $select = mysqli_query($con, 'select * from partner where solution = "network-optimization"');
              while ($logo = mysqli_fetch_array($select)) {
              ?>
                <img src="assets/gambar/<?= $logo['image'] ?>" alt="">
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="modal6">
    <div class="modal-content">
      <div class="isi">
        <span class="close" onclick="toggleModal('modal6')">&times;</span>
        <div class="row d-flex card-content">
          <div class="col-md-6 card-texts">
            <h4><b>Visual & Display</b></h4>
            <p>Visual display refers to the presentation of information, data, or content in a visual format using various display technologies. These visual displays play a crucial role in delivering information to users in a visually appealing and easily understandable manner</p>
            <p>Well-designed visual displays have unique potential for communicating complex information. They can show the structure of the data in ways that are impossible with text. They can allow users to explore the data in personally relevant ways. They can improve access for users with limited reading ability.</p>
            <ul>
              <li>Monitoring Area</li>
              <li>Visual Advertising Content</li>
              <li>Educational Actvity</li>
              <li>Public Information</li>
            </ul>
          </div>
          <div class="col-md-6 image-solution">
            <div class="image-kanan">
              <img src="assets/images/logo visual display hijau.png" alt="">
            </div>
            <div class="logo-series mt-5">
              <?php
              $select = mysqli_query($con, 'select * from partner where solution = "visual-and-display"');
              while ($logo = mysqli_fetch_array($select)) {
              ?>
                <img src="assets/gambar/<?= $logo['image'] ?>" alt="">
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="modal7">
    <div class="modal-content">
      <div class="isi">
        <span class="close" onclick="toggleModal('modal7')">&times;</span>
        <div class="row d-flex card-content">
          <div class="col-md-6 card-texts">
            <h4><b>Enterprise Mobility Management</b></h4>
            <p>Enterprise mobility directly increases productivity by utilizing email, word processing, CRM applications or BI applications available on mobile devices. IT process requires a solution that can optimize the power of mobility itself without compromising the user side, data security and privacy.</p>
            <p>Solutions Enterprise Mobility Management (EMM) forms a dynamic platform to manage mobility applications, devices, services and users, which have entered the stage EMM enterprise-ready so that secure and flexible. EMM flexibility makes it a perfect solution to manage mobile devices such as Smartphones and tablets are safer than ever before.</p>
            <p>EMM is now acting as a solution BYOD end-to-end / holistic and offers security, technology management, application management, system device until towards content management, coupled with features such as real-time reporting, self-service, management of alerts and remote access much to the data center.</p>
            <ul>
              <li>Mobile Device Management</li>
              <li>Mobile App Management</li>
              <li>Workspace</li>
            </ul>
          </div>
          <div class="col-md-6 image-solution">
            <div class="image-kanan">
              <img src="assets/images/logo enterprise mobility merah.png" alt="">
            </div>
            <div class="logo-series mt-5">
              <?php
              $select = mysqli_query($con, 'select * from partner where solution = "enterprise-mobility-management"');
              while ($logo = mysqli_fetch_array($select)) {
              ?>
                <img src="assets/gambar/<?= $logo['image'] ?>" alt="">
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="modal8">
    <div class="modal-content">
      <div class="isi">
        <span class="close" onclick="toggleModal('modal8')">&times;</span>
        <div class="row d-flex card-content">
          <div class="col-md-6 card-texts">
            <h4><b>Business Continuity</b></h4>
            <p>During the development of digital transformation, many companies were vulnerable to various disruptions that resulted in the interruption of business processes. One of them is a disruption of electrical resources, this can disrupt company productivity so that it harms increasing income. What’s more, your company’s reputation will be looked down upon by partners and stakeholders.</p>
            <p>Companies need services Business Continuity Management (BCM) are effective where it can reduce the disruption caused by social disaster (electrical, fire, riot) and natural disasters (earthquakes, floods). Business Continuity solution offers protection and security as well as compliance with regulations on the firm side.</p>
            <ul>
              <li>Backup Recovery Strategy</li>
              <li>High Availability</li>
            </ul>
          </div>
          <div class="col-md-6 image-solution">
            <div class="image-kanan">
              <img src="assets/images/logo business continutity hijau.png" alt="">
            </div>
            <div class="logo-series mt-5">
              <?php
              $select = mysqli_query($con, 'select * from partner where solution = "business-continuity"');
              while ($logo = mysqli_fetch_array($select)) {
              ?>
                <img src="assets/gambar/<?= $logo['image'] ?>" alt="">
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Script Modal
    function toggleModal(modalId) {
      const modal = document.getElementById(modalId);
      const body = document.querySelector('body');

      if (modal.classList.contains("show")) {
        modal.classList.remove("show");
        body.style.overflow = "auto"; // Mengembalikan overflow ke auto saat modal disembunyikan
      } else {
        modal.classList.add("show");
        body.style.overflow = "hidden"; // Mengatur overflow menjadi hidden saat modal ditampilkan
      }
    }


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

  <!-- ================================================ section 4 ============================================ -->
  <section id="abt">
    <div class="container contentabt">
      <div class="container">
        <h3 data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" style="color:  rgba(6, 223, 177, 0.9);"><b>About</b> <b style="color: #ffffff;">Us</b></h3>
        <div class="garis-tebal" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" style="width:100px; border: solid 1px; margin-bottom: 50px;"></div>
        <p data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
          We help all sizes organizations from individuals to companies to analyze business impact, and business growth by making improvements dynamic according to business needs global. We are committed to providing quality services so that IT clients' needs are met
        </p>

        <div class="texts" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
          <a href="https://www.arthamitrainternasional.com/aboutus" class="textssss">
            <b class="textasd">More</b>
          </a>
        </div>

        <div class="brand-gallery" id="brandGallery">

        </div>
      </div>

    </div>
  </section>

  <!--section #5-->
  <section id="section-5">
    <div class="container">
      <div class="partner">
        <h2 class="mt-5 text-center" style="color: #088395;" data-aos="zoom-in-down" data-aos-anchor-placement="bottom-bottom"><b>Our Clients</b></h2>
      </div>
      <div class="asd mt-5" data-aos="fade-" data-aos-anchor-placement="bottom-bottom">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row row-cols-2 row-cols-md-3 g-4">
                <div class="image-item col-md-4">
                  <img src="assets/images/1.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/2.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/3.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/4.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/13.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/14.png" class="d-block w-25 mx-auto" alt="...">
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row row-cols-2 row-cols-md-3 g-4">
                <div class="image-item col-md-4">
                  <img src="assets/images/5.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/6.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/7.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/8.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/15.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/16.png" class="d-block w-25 mx-auto" alt="...">
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row row-cols-2 row-cols-md-3 g-4">
                <div class="image-item col-md-4">
                  <img src="assets/images/9.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/10.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/11.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/12.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/17.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/18.png" class="d-block w-25 mx-auto" alt="...">
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row row-cols-2 row-cols-md-3 g-4">
                <div class="image-item col-md-4">
                  <img src="assets/images/19.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/20.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/21.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/22.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/23.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/24.png" class="d-block w-25 mx-auto" alt="...">
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row row-cols-2 row-cols-md-3 g-4">
                <div class="image-item col-md-4">
                  <img src="assets/images/25.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/26.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/27.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/28.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/29.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/30.png" class="d-block w-25 mx-auto" alt="...">
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row row-cols-2 row-cols-md-3 g-4">
                <div class="image-item col-md-4">
                  <img src="assets/images/31.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/32.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/33.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/34.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/35.png" class="d-block w-25 mx-auto" alt="...">
                </div>
                <div class="image-item col-md-4">
                  <img src="assets/images/36.png" class="d-block w-25 mx-auto" alt="...">
                </div>
              </div>
            </div>
            <!-- Add more carousel items as needed -->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================ artikel ================================================== -->
  <section>
    <div class="container artikelss">
      <div class="judul-section-5 mt-5">
        <h2 style="color: #088395; width: 100%; display: flex; justify-content: center;"><b>Latest News And Promos</b></h2>
      </div>

      <div class="card-artikel">
        <div class="card-container wrap-content-card">
          <?php
          $select = mysqli_query($con, 'select * from artikel where status = "0" ORDER BY id DESC limit 6;');
          while ($row = mysqli_fetch_array($select)) {
            $trimmed_content = substr($row['konten'], 0, 100); // Hanya menampilkan 200 karakter pertama
          ?>
            <div class="card-item item-card">
              <div class="card kartu col-6" style="width: 20rem; height: 380px">
                <!-- Konten Card -->
                <img src="assets/gambar/<?= $row['gambar'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title ellipsis-text"><?= $row['judul'] ?></h5>
                  <?php
                  echo '<p class="card-text">' . $trimmed_content . '...</p>'; // Menampilkan isi konten yang sudah dipotong
                  ?>
                  <a href="detail-artikel?id=<?= $row['id'] ?>" class="card-link"><button type="button" class="btn btn-primary button-artikel">Read More</button></a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>

    </div>
    <div class="container">
      <div class="texts" data-aos="fade-right" data-aos-anchor-placement="bottom-bottom">
        <a href="https://www.arthamitrainternasional.com/artikel_all"><b style="color: #088395; text-decoration:none;">More</b></a>
      </div>
    </div>
  </section>
  <!-- ============================== section contact ==================================== -->

  <section id="contact">
    <div class="wrap">
      <div class="wraps">
        <div class="textbaner" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
          <h4 style="color: #088395;"><b>Get In Touch</b></h4>
        </div>
        <div class="container s02">
          <section id="mapss">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1700.3068039436255!2d106.82977486341517!3d-6.14216607854277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5f83c06f523%3A0x81fe78311129fd7a!2sKlik4it.com!5e0!3m2!1sid!2sid!4v1699851932952!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </section>
          <div class="formcontact">
            <div class="form-contact">
              <form action="pesan" method="post">
                <div class="mb-3" data-aos="fade-right" data-aos-anchor-placement="bottom-bottom">
                  <label for="exampleFormControlInput1" class="form-label">Name</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="namap" placeholder="Name">
                </div>
                <div class="mb-3" data-aos="fade-right" data-aos-anchor-placement="bottom-bottom">
                  <label for="exampleFormControlInput1" class="form-label">Contact</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="kontakp" placeholder="Contact">
                </div>
                <div class="mb-3" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                  <label for="exampleFormControlInput1" class="form-label">Email</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" name="emailp" placeholder="Email">
                </div>
                <div class="mb-3" data-aos="fade-down" data-aos-anchor-placement="bottom-bottom">
                  <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="pesanp" rows="3"></textarea>
                </div>
                <button type="submit" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom" class="btn btn-primary button-artikel">Send</button>
              </form>
            </div>
          </div>
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
            </div>
          </div>
        </div>
        <div class="column">
          <h5><b>Menu</b></h5>
          <div class="garis"></div>
          <div class="ouurs" style="padding:25px">
            <a href="https://arthamitrainternasional.com/goverment">
              <p>Government</p>
            </a>
            <a href="https://arthamitrainternasional.com/main">
              <p>Corporate</p>
            </a>
            <a href="https://arthamitrainternasional.com/produk">
              <p>Product</p>
            </a>
            <a href="https://arthamitrainternasional.com/artikel_all">
              <p>Articles</p>
            </a>
            <a href="https://arthamitrainternasional.com/aboutus">
              <p>About</p>
            </a>
            <a href="https://arthamitrainternasional.com/kontak">
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
                <a href="mailto:management@arthamitrainternasional.com">management@arthemitrainternasional.com </a>
              </div>
            </div>
            <div class="logos">
              <a href="https://www.facebook.com/?locale=id_ID"><i class="fa-brands fa-square-facebook fa-2xl text-white"></i></a>
              <a href="https://www.instagram.com"><i class="fa-brands fa-square-instagram fa-2xl text-white"></i></a>
              <a href="https://twitter.com/?lang=id"><i class="fa-brands fa-square-twitter fa-2xl text-white"></i></a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </footer>
  <footer id="copyright">
    <p style="color: #ffffff; padding:20px; width:100%; display:flex; justify-content:center;"><b>© 2023 PT. Artha Mitra Internasional</b></p>
  </footer>


</body>
<script src="jquery.min.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>
<script>
  AOS.init();

  function hideGallery() {
    const brandGallery = document.getElementById('brandGallery');
    brandGallery.innerHTML = '';
    brandGallery.style.display = 'none';
  }

  document.getElementById("elemenID").addEventListener("dragstart", function(event) {
    event.preventDefault();
  });
</script>

</html>