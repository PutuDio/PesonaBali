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
    $id_paket = mysqli_real_escape_string($conn, $_POST['id_paket']);
    $id_guide = mysqli_real_escape_string($conn, $_POST['id_guide']);
    $guest = mysqli_real_escape_string($conn, $_POST['guest']);
    $arrivals = mysqli_real_escape_string($conn, $_POST['arrivals']);
    $leaving = mysqli_real_escape_string($conn, $_POST['leaving']);

    // Query SQL untuk menyimpan data booking ke dalam database
    $sql = "INSERT INTO book (name, email, phone, address, id_paket, id_guide, guest, arrivals, leaving)
            VALUES ('$name', '$email', '$phone', '$address', '$id_paket', '$id_guide', '$guest', '$arrivals', '$leaving')";

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
/* Booking Page Styles */
.book {
    background: var(--light-gray);
    padding: 100px 0;
}
.book .card {
    border-radius: var(--border-radius);
    border: none;
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    height: 100%;
}
.book .card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.book form {
    background: var(--white);
    padding: 40px;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-lg);
}
.book form label {
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 8px;
    font-size: 15px;
}
.book form input,
.book form textarea,
.book form select {
    padding: 15px;
    color: var(--dark-color);
    border: 1px solid #e0e0e0;
    background: #fdfdfd;
    outline: none;
    font-size: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    transition: var(--transition);
    width: 100%;
}
.book form input:focus,
.book form textarea:focus,
.book form select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(255, 122, 0, 0.1);
}
.book .submit {
    width: 100%;
    padding: 15px;
    font-size: 16px;
    font-weight: 700;
    background: var(--primary-color);
    color: var(--white);
    border: none;
    border-radius: 30px;
    margin-top: 10px;
    transition: var(--transition);
    box-shadow: 0 4px 15px rgba(255, 122, 0, 0.3);
    cursor: pointer;
}
.book .submit:hover {
    background: var(--primary-hover);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 122, 0, 0.4);
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
                    
                    <!-- Input Paket Destinasi -->
                    <label class="form-label">Tour Package :</label>
                    <select class="form-control" name="id_paket" required>
                        <option value="">-- Choose Package --</option>
                        <?php
                            $paket_query = mysqli_query($conn, "SELECT * FROM tb_paket");
                            while($p = mysqli_fetch_assoc($paket_query)){
                                echo '<option value="'.$p['id_paket'].'">'.$p['nama_paket'].'</option>';
                            }
                        ?>
                    </select>

                    <!-- Input Guide -->
                    <label class="form-label">Select Guide :</label>
                    <select class="form-control" name="id_guide" required>
                        <option value="">-- Choose Guide --</option>
                        <?php
                            $guide_query = mysqli_query($conn, "SELECT * FROM tb_guide");
                            while($g = mysqli_fetch_assoc($guide_query)){
                                echo '<option value="'.$g['id_guide'].'">'.$g['nama_guide'].' ('.$g['bahasa'].')</option>';
                            }
                        ?>
                    </select>
                    
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
