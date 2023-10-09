<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "koswara0790asep@gmail.com"; // Ganti dengan alamat email penerima
    $subject = "Pesan dari Form Kontak"; // Ganti dengan subjek yang sesuai

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";

    $emailBody = "
    <html>
    <body>
    <h2>Pesan dari Form Kontak</h2>
    <p><strong>Nama:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Pesan:</strong></p>
    <p>$message</p>
    </body>
    </html>
    ";

    if (mail($to, $subject, $emailBody, $headers)) {
        echo "Pesan berhasil dikirim.";
    } else {
        echo "Terjadi kesalahan saat mengirim pesan.";
    }
}
?>