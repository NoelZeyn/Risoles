<?php
$servername = "localhost";
$username = "root";
$password = "230104Merdeka@";
$dbname = "risoles_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string(htmlspecialchars($_POST['name']));
    $email = $conn->real_escape_string(htmlspecialchars($_POST['email']));
    $order = $conn->real_escape_string(htmlspecialchars($_POST['order']));

    $sql = "INSERT INTO orders (name, email, order_details) VALUES ('$name', '$email', '$order')";

    if ($conn->query($sql) === TRUE) {
        echo "Pesanan Anda telah berhasil dikirim.";
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
} else {
    echo "Metode pengiriman tidak valid.";
}

$conn->close();
?>