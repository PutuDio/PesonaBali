<?php


// Menyertakan file header dan koneksi database
require_once 'header.php';
require_once '../include/koneksi.php';


// Mengecek apakah tombol submit telah ditekan
if (isset($_POST['submit'])) {
    // Mengamankan data input dari SQL Injection dengan mysqli_real_escape_string
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $guest = mysqli_real_escape_string($conn, $_POST['guest']);
    $arrivals = mysqli_real_escape_string($conn, $_POST['arrivals']);
    $leaving = mysqli_real_escape_string($conn, $_POST['leaving']);

    // Query SQL untuk menyimpan data booking ke dalam database
    $sql = "INSERT INTO book (name, email, phone, address, location, guest, arrivals, leaving)
            VALUES ('$name', '$email', '$phone', '$address', '$location', '$guest', '$arrivals', '$leaving')";

    // Menjalankan query dan mengecek apakah berhasil
    if (mysqli_query($conn, $sql)) {
        // Jika berhasil, redirect ke halaman book.php
        header('location: book.php');
        exit;
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>


<style>
    .book {
        background: #f9f9f9;
        padding: 50px;
    }
    .book .card {
        border-radius: 10px;
        box-shadow: 0px 5px 5px -6px black;
    }
    .book .row {
        margin-top: 30px;
    }
    .book form input,
    .book form textarea {
        padding: 10px;
        color: black;
        border: none;
        outline: none;
        font-size: 15px;
        border-radius: 10px;
        box-shadow: 0px 5px 5px -6px black;
        margin-bottom: 10px;
    }
    .book .submit {
        width: 160px;
        font-size: 16px;
        font-weight: 550;
        background: #ffa500;
        color: #f9f9f9;
        margin-top: 10px;
        transition: 0.5s;
    }
</style>


<section class="book" id="book">
    <div class="container book">
        <div class="main-txt">
            <h1><span>B</span>ooking</h1>
        </div>
        <div class="row">
            <div class="col-md-6 py-3 py-md-0">
                <div class="card">
                    <img src="../img/book.jpg" alt="" />
                </div>
            </div>
            <div class="col-md-6 py-3 py-md-0">
                <form method="post">
                    <!-- Input Nama -->
                    <label class="form-label">Full Name :</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" required />
                    <!-- Input Email -->
                    <label class="form-label">Email :</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required />
                    <!-- Input Nomor Telepon -->
                    <label class="form-label">Phone :</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter your number" required />
                    <!-- Input Alamat -->
                    <label class="form-label">Address :</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter your address" required />
                    <!-- Input Lokasi Wisata -->
                    <label class="form-label">Where To :</label>
                    <input type="text" class="form-control" name="location" placeholder="Place you want to visit" required />
                    <!-- Input Jumlah Tamu -->
                    <label class="form-label">How Many :</label>
                    <input type="text" class="form-control" name="guest" placeholder="Number of guests" required />
                    <!-- Input Tanggal Kedatangan -->
                    <label class="form-label">Arrivals :</label>
                    <input type="date" class="form-control" name="arrivals" placeholder="Arrivals" required />
                    <!-- Input Tanggal Kepergian -->
                    <label class="form-label">Leaving :</label>
                    <input type="date" class="form-control" name="leaving" placeholder="Leaving" required />
                    <!-- Tombol Submit -->
                    <input type="submit" value="Book Now" class="submit" name="submit" />
                </form>
            </div>
        </div>
    </div>
</section>


<!-- Menyertakan file footer -->
<?php require_once 'footer.php'; ?>
