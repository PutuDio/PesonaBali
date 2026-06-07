<?php


// Menghubungkan ke database
require_once '../include/koneksi.php';
// Periksa apakah koneksi berhasil
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Periksa apakah form telah disubmit
if (isset($_POST['submit'])) {
    // Mengambil data dari form dan mengamankannya dengan mysqli_real_escape_string
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $guest = mysqli_real_escape_string($conn, $_POST['guest']);
    $arrivals = mysqli_real_escape_string($conn, $_POST['arrivals']);
    $leaving = mysqli_real_escape_string($conn, $_POST['leaving']);

    // Query untuk menyimpan data ke dalam tabel book
    $sql = "INSERT INTO book (name, email, phone, address, location, guest, arrivals, leaving)
            VALUES ('$name', '$email', '$phone', '$address', '$location', '$guest', '$arrivals', '$leaving')";

    // Eksekusi query dan periksa apakah berhasil
    if (mysqli_query($conn, $sql)) {
        // Redirect ke halaman book.php jika berhasil
        header('location: book.php');
    } else {
        // Tampilkan pesan error jika query gagal
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


// Menutup koneksi database setelah selesai
mysqli_close($conn);
?>