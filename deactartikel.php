<?php
require_once "connection.php";

if (isset($_GET['idp'])) {
    $idp = $_GET['idp'];

    $select = mysqli_query($con, "select * from artikel");
    $ambil = mysqli_fetch_array($select);
    $status = $ambil["status"];

    if ($status == "0") {
        $update = mysqli_query($con, "update artikel set status = '1' where id = $idp");
    } else if ($status == "1") {
        $update = mysqli_query($con, "update artikel set status = '0' where id = $idp");
    }

    if ($update) {
        echo '<script>alert("Data Berhasil Diubah )</script>';
        echo '<script>window.location.assign("https://www.arthamitrainternasional.com/artikel");</script>';
    } else {
        echo '<script>alert("Data Gagal Diubah")</script>';
        echo '<script>window.location.assign("https://www.arthamitrainternasional.com/partner");</script>';
    }
} else {
    echo '<script>alert("ID Produk tidak ditemukan")</script>';
    echo '<script>window.location.assign("https://www.arthamitrainternasional.com/partner");</script>';
}
