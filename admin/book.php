<?php
// Menyertakan file header
require_once 'header.php';
require_once '../include/koneksi.php';

$tanggal = isset($_GET['tanggal']) ? mysqli_real_escape_string($conn, $_GET['tanggal']) : '';
$bulan = isset($_GET['bulan']) ? mysqli_real_escape_string($conn, $_GET['bulan']) : '';
$tahun = isset($_GET['tahun']) ? mysqli_real_escape_string($conn, $_GET['tahun']) : '';

$sql = "SELECT * FROM book WHERE 1=1";

if ($tanggal != '') {
    $sql .= " AND arrivals = '$tanggal'";
}

if ($bulan != '') {
    $sql .= " AND MONTH(arrivals) = '$bulan'";
}

if ($tahun != '') {
    $sql .= " AND YEAR(arrivals) = '$tahun'";
}

$result = mysqli_query($conn, $sql);

// Menyertakan file koneksi ke database
$result = mysqli_query($conn, $sql);

// Query untuk mengambil semua data dari tabel "book"
if ($result) {
    ?>
    <div class="col-12">
        <div class="bg-white p-3">
        <h4>Booking List</h4>
        <form method="GET" class="mb-3">
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="date" name="tanggal" class="form-control" value="<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : '' ?>">
                </div>
                <div class="col-md-3">
                    <select name="bulan" class="form-control">
                        <option value="">-- Pilih Bulan --</option>
                        <?php 
                        for ($i = 1; $i <= 12; $i++) {
                            $selected = (isset($_GET['bulan']) && $_GET['bulan'] == $i) ? 'selected' : '';
                            echo "<option value='$i' $selected>" . date("F", mktime(0, 0, 0, $i, 10)) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="tahun" class="form-control">
                        <option value="">-- Pilih Tahun --</option>
                        <?php 
                        $currentYear = date('Y');
                        for ($y = $currentYear; $y >= 2000; $y--) {
                            $selected = (isset($_GET['tahun']) && $_GET['tahun'] == $y) ? 'selected' : '';
                            echo "<option value='$y' $selected>$y</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2 d-flex">
                    <button type="submit" class="btn btn-primary me-2 w-50">Cari</button>
                    <a href="book.php" class="btn btn-secondary w-50">Reset</a>
                </div>
            </div>
        </form>
        <div class="mb-3">
            <a href="export_pdf.php?tanggal=<?= $_GET['tanggal'] ?? '' ?>&bulan=<?= $_GET['bulan'] ?? '' ?>&tahun=<?= $_GET['tahun'] ?? '' ?>" class="btn btn-danger">Download PDF</a>
        </div>
            <table class="table table-striped-columns table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Location</th>
                        <th class="text-center">Guest</th>
                        <th class="text-center">Arrivals</th>
                        <th class="text-center">Leaving</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop melalui hasil query dan menampilkan data dalam tabel
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>';
                                echo '<td class="text-center">'.$row['id_book'].'</td>';
                                echo '<td>'.$row['name'].'</td>';
                                echo '<td>'.$row['email'].'</td>';
                                echo '<td>'.$row['phone'].'</td>';
                                echo '<td>'.$row['address'].'</td>';
                                echo '<td>'.$row['location'].'</td>';
                                echo '<td>'.$row['guest'].'</td>';
                                echo '<td>'.$row['arrivals'].'</td>';
                                echo '<td>'.$row['leaving'].'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
} else {
    // Menampilkan pesan kesalahan jika query gagal
    echo "Error: " . mysqli_error($conn);
}

// Menutup koneksi database
mysqli_close($conn);
// Menyertakan file footer
require_once 'footer.php';
?>

<script type="text/javascript">
    $('.nav-link').removeClass('active');
    $('.menu-booking').addClass('active');
</script>