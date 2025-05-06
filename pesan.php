<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["namap"];
    $kontak = $_POST["kontakp"];
    $email = $_POST["emailp"];
    $message = $_POST["pesanp"];

    // Bersihkan dan validasi data
    $name = htmlspecialchars($name);
    $kontak = htmlspecialchars($kontak);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($message);

    // Gabungkan informasi kontak ke dalam pesan
    $messageBody = "Name: $name\nContact: $kontak\nEmail: $email\n\nMessage:\n$message";

    $to = "management@arthamitrainternasional.com, webmaster@arthamitrainternasional.com, vincent.richard12345@gmail.com";
    $subject = "New Contact Form Submission";
    $headers = "From: $email";

    // Kirim email
    mail($to, $subject, $messageBody, $headers);

    // Optional: Redirect to a thank you page
    header("Location: https://www.arthamitrainternasional.com/main");
}
