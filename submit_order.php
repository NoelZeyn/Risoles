<?php
require 'vendor/autoload.php'; // Pastikan composer telah digunakan untuk menginstal mongodb driver

use MongoDB\Client as MongoDBClient;

$mongoClient = new MongoDBClient("mongodb+srv://IStoum:230104Merdeka%40@cluster0.fifozcz.mongodb.net/");
$mongoCollection = $mongoClient->risoles_db->orders; // Sesuaikan dengan nama database dan koleksi Anda di MongoDB

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $order = htmlspecialchars($_POST['order']);

    $insertResult = $mongoCollection->insertOne([
        'name' => $name,
        'email' => $email,
        'order_details' => $order
    ]);

    if ($insertResult->getInsertedCount() === 1) {
        echo "Pesanan Anda telah berhasil dikirim.";
    } else {
        echo "Terjadi kesalahan saat menyimpan pesanan.";
    }
} else {
    echo "Metode pengiriman tidak valid.";
}
?>