<?php
$servername = "localhost";
$database = "kitap";
$username = "root";
$password = "";
//bağlantı oluşturma
$conn = new mysqli($servername, $username, $password, $database);
//bağlantıyı kontrol etme
if ($conn -> connect_error) {
    die("Bağlantı hatası... " .$conn->connect_error);
}
//Türkçe karekterler için 
$charset = "utf8mb4";
$conn -> set_charset($charset);
?>