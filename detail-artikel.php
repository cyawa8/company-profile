<?php
require_once 'connection.php';

$ida = $_GET['id'];
$stmt = mysqli_prepare($con, "SELECT * FROM artikel WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $ida);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$ambil = mysqli_fetch_array($result);

if (!$ambil) {
    echo "<script>alert('Artikel tidak ditemukan'); window.location.href='https://www.arthamitrainternasional.com/artikel_all';</script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($ambil['judul']) ?></title>

    <!-- Stylesheets -->
    <link rel="icon" href="assets/images/logoARMI.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="css/detail-artikel.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/fae96b79f4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="js/Chart.js/Chart.js"></script>
</head>

<body>
    <style>
        .navbar-opaque {
            background-color: white;
            font-weight: bold;
            box-shadow: none;
        }

        #navbar-logo-scroll {
            display: none;
        }
    </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-opaque nav-navlink">
        <div class="container nav-paling-atas">
            <a class="navbar-brand" href="#">
                <img src="assets/images/armi-logo-item.png" alt="Logo Scroll" width="120">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav nav-underline ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Government</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="https://www.arthamitrainternasional.com/goverment">Tentang</a></li>
                            <li><a class="dropdown-item" href="https://www.arthamitrainternasional.com/produk">Produk</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="https://www.arthamitrainternasional.com/main">Corporate</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://www.arthamitrainternasional.com/https://klik4it.com/">Commerce</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://www.arthamitrainternasional.com/kontak">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Artikel Detail -->
    <section id="content">
        <div class="container">
            <div class="judul-content">
                <h3><b><?= htmlspecialchars($ambil['judul']) ?></b></h3>
            </div>
            <img src="assets/gambar/<?= htmlspecialchars($ambil['gambar']) ?>" alt="" class="image-hero">
            <hr>

            <div class="atas d-flex justify-content-between">
                <div class="sharing">
                    <h5>Share</h5>
                    <div class="social-icons">
                        <a href="https://api.whatsapp.com/send?text=Halo" target="_blank"><img src="assets/images/whatsapp.png" style="width: 25px;"></a>
                        <a href="https://www.instagram.com/" target="_blank"><img src="assets/images/instagram.png" style="width: 25px;"></a>
                        <a href="https://www.facebook.com/" target="_blank"><img src="assets/images/facebook.png" style="width: 25px;"></a>
                    </div>
                </div>
                <div class="tanggal">
                    <p>Di post pada : <?= htmlspecialchars($ambil['tanggal']) ?></p>
                </div>
            </div>

            <hr>
            <div class="isi-content">
                <p><?= nl2br(htmlspecialchars($ambil['konten'])) ?></p>
            </div>
            <hr>

            <!-- Artikel Rekomendasi -->
            <article class="artikel-rekomendsi">
                <div class="bungkus">
                    <div class="row">
                        <?php
                        $ambilArtikel = mysqli_query($con, "SELECT * FROM artikel WHERE id != '$ida' AND status = '0' ORDER BY tanggal DESC LIMIT 4");
                        while ($artikel = mysqli_fetch_array($ambilArtikel)) {
                            $trimmed_judul = (strlen($artikel['judul']) > 30) ? substr($artikel['judul'], 0, 30) . '...' : $artikel['judul'];
                            $trimmed_konten = (strlen($artikel['konten']) > 50) ? substr($artikel['konten'], 0, 50) . '...' : $artikel['konten'];
                        ?>
                            <div class="col-md-3 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <img src="assets/gambar/<?= htmlspecialchars($artikel["gambar"]) ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title" title="<?= htmlspecialchars($artikel['judul']) ?>">
                                            <?= htmlspecialchars($trimmed_judul) ?>
                                        </h5>
                                        <p class="card-text"><?= htmlspecialchars($trimmed_konten) ?></p>
                                    </div>
                                    <div class="card-footer bg-white border-0">
                                        <a href="detail-artikel.php?id=<?= $artikel['id'] ?>" class="btn btn-outline-primary w-100">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </article>

            <div class="lainnya">
                <a href="https://www.arthamitrainternasional.com/artikel_all" class="card-link">Lainnya >>></a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <div class="footer">
            <div class="grid">
                <div class="column">
                    <img src="assets/images/ARMI-putih.png" style="width: 70%;">
                    <div class="logos mt-3">
                        <a href="https://www.facebook.com/?locale=id_ID"><i class="fa-brands fa-square-facebook fa-2xl text-white"></i></a>
                        <a href="https://www.instagram.com"><i class="fa-brands fa-square-instagram fa-2xl text-white"></i></a>
                        <a href="https://twitter.com/?lang=id"><i class="fa-brands fa-square-twitter fa-2xl text-white"></i></a>
                    </div>
                </div>

                <div class="column">
                    <h5><b>Menu</b></h5>
                    <div class="garis"></div>
                    <div class="ouurs py-3">
                        <a href="goverment">
                            <p>Government</p>
                        </a>
                        <a href="main">
                            <p>Corporate</p>
                        </a>
                        <a href="product">
                            <p>Product</p>
                        </a>
                        <a href="artikel_all">
                            <p>Articles</p>
                        </a>
                        <a href="aboutus">
                            <p>About</p>
                        </a>
                        <a href="kontak">
                            <p>Contact</p>
                        </a>
                    </div>
                </div>

                <div class="column">
                    <h5><b>Address</b></h5>
                    <div class="garis"></div>
                    <p class="py-3">Ruko Pangeran Jayakarta 129 Blok C No.33<br>JL.Pangeran Jayakarta<br>Jakarta Pusat 11110<br>Indonesia</p>

                    <h5><b>Contact</b></h5>
                    <div class="garis"></div>
                    <div class="py-3">
                        <p><a href="tel:+62 21 612 0866">+62 21 612 0866</a></p>
                        <p><a href="mailto:management@klik4it.com">management@klik4it.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <footer id="copyright">
        <p class="text-white text-center py-3"><b>© 2023 PT. Artha Mitra Internasional</b></p>
    </footer>
</body>

</html>