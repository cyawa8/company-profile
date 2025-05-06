<?php
// $con = mysqli_connect("localhost", "root", "", "arthamitrainternasional") or die("Connection Failed : " . mysqli_connect_error());
$con = mysqli_connect("localhost", "u218389119_armi", "4Rmi1234!!!", "u218389119_armi") or die("Connection Failed : " . mysqli_connect_error());
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
    exit();
}
