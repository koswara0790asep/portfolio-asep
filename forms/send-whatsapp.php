<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $phoneNumber = $_POST["phone_number"];
    $message = $_POST["message"];

    // $apiKey = "YOUR_API_KEY"; // Ganti dengan kunci API Anda
    $apiUrl = "https://api.whatsapp.com/send?phone=6289621771309&text=" . urlencode($message);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        http_response_code(200);
        echo "Pesan berhasil dikirim!";
    } else {
        http_response_code(500);
        echo "Terjadi kesalahan saat mengirim pesan.";
    }
} else {
    http_response_code(405);
    echo "Metode HTTP tidak diizinkan.";
}
?>
