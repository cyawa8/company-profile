<?php
require_once "connection.php";

if (isset($_GET['idp'])) {
    $idp = $_GET['idp'];

    // Fetch the image file name based on the product ID
    $query = "SELECT `image` FROM `produk` WHERE `idp`='$idp'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $imageFileName = $row['image'];

        // Delete the image file
        $targetDir = "assets/gambar/";
        unlink($targetDir . $imageFileName);

        // Delete the product record
        $deleteQuery = "DELETE FROM `produk` WHERE `idp`='$idp'";
        $deleteResult = mysqli_query($con, $deleteQuery);

        if ($deleteResult) {
            echo '<script>alert("Produk dan gambar berhasil dihapus")</script>';
            echo '<script>window.location.assign("https://www.arthamitrainternasional.com/produk-admin");</script>';
        } else {
            echo '<script>alert("Gagal menghapus produk")</script>';
            echo '<script>window.location.assign("https://www.arthamitrainternasional.com/produk-admin");</script>';
        }
    } else {
        echo '<script>alert("Data tidak ditemukan")</script>';
        echo '<script>window.location.assign("https://www.arthamitrainternasional.com/produk-admin");</script>';
    }
} else {
    echo '<script>alert("ID Produk tidak ditemukan")</script>';
    echo '<script>window.location.assign("https://www.arthamitrainternasional.com/produk-admin");</script>';
}
