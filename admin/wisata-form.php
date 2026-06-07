<?php
// Menyertakan file header dan koneksi ke database
require_once 'header.php';
require_once '../include/koneksi.php';

// Memulai output buffering
ob_start();

// Mengecek apakah terdapat parameter id_wisata pada URL
if(isset($_GET['id_wisata'])) {
    // Query untuk mengambil data objek wisata berdasarkan id_wisata
    $sql = "SELECT * FROM objek_wisata WHERE id_wisata=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $_GET['id_wisata']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $wisata = mysqli_fetch_assoc($result);
}
?>

<div class="col-12">
    <div class="bg-white p-3">
        <h4>Obyek Wisata Form</h4>
        <form method="post" enctype="multipart/form-data">
            <?php
            if(isset($_GET['id_wisata'])) {
                echo  '<input type="hidden" name="id_wisata" value="'.$_GET['id_wisata'].'">';
            }
            ?>

            <div class="mb-3">
                <select class="form-select" name="id_kategori" required>
                    <option value="">--- Select Category ---</option>
                    <?php
                    $sql_kt = 'SELECT * FROM tb_kategori';
                    $query_kt = mysqli_query($conn, $sql_kt);
                    while($result_kt = mysqli_fetch_assoc($query_kt)) {
                        ?>
                        <!-- Menampilkan kategori dengan opsi yang dipilih jika dalam mode edit -->
                        <option value="<?=$result_kt['id_kategori'] ?>" <?= isset($_GET['id_wisata']) ? ($result_kt['id_kategori'] == $wisata['id_kategori'] ? 'selected' : '') : '' ?>><?=$result_kt['kategori'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            
            <!-- Input Nama Wisata -->
            <div class="mb-3">
                <input type="text" name="nama_wisata" placeholder="Name Obyek" class="form-control" value="<?= isset($_GET['id_wisata']) ? $wisata['nama_wisata']:''; ?>" required>
            </div>
            <!-- Input Keterangan Wisata -->
            <div class="mb-3">
                <textarea class="form-control" name="keterangan"  rows="3" placeholder="Information Obyek "><?= isset($_GET['id_wisata']) ? $wisata['keterangan']:''; ?></textarea>
            </div> 
            <!-- Input Deskripsi Wisata -->
            <div class="mb-3">
                <textarea class="form-control" name="deskripsi"  rows="4" placeholder="Description Obyek"><?= isset($_GET['id_wisata']) ? $wisata['deskripsi']:''; ?></textarea>
            </div> 
            <!-- Input Gambar Wisata -->
            <div class="mb-3">
                <label class="form-label">Picture Obyek</label>
                <!-- Jika dalam mode edit, tampilkan gambar saat ini -->
                <?= isset($_GET['id_wisata']) ? '<div class= "mb-3"><img src="'.$wisata['gambar'].'" width="200px"></div>' :''; ?>
                <input class="form-control" type="file" name="gambar" required>
            </div>
            
            <!-- Tombol kembali ke daftar wisata -->
            <a href="wisata.php" class="btn btn-success">Back</a>
            <!-- Tombol submit form -->
            <button type="submit" class="btn btn-primary ">Save</button>
        </form>
    </div>
</div>

<?php
function uploadFile(){
    $tmp_dir = $_FILES['gambar']['tmp_name']; // Direktori sementara file yang diupload
    $tar_dir = '../img/'.$_FILES['gambar']['name']; // Direktori tujuan penyimpanan
    move_uploaded_file($tmp_dir, $tar_dir); // Memindahkan file yang diupload
    return $tar_dir;// Mengembalikan path file
}

// Mengecek apakah ada data yang dikirim melalui form
if(sizeof($_POST) > 0) {
    if(isset($_POST['id_wisata'])){
        // Jika dalam mode edit, lakukan update data
        $dir = uploadFile(); // Upload gambar dan mendapatkan path file
        $sql = "UPDATE objek_wisata SET nama_wisata=?, keterangan=?, deskripsi=?, gambar=?, id_kategori=? WHERE id_wisata=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssii", $_POST['nama_wisata'], $_POST['keterangan'], $_POST['deskripsi'], $dir, $_POST['id_kategori'], $_POST['id_wisata']);
    }else{
        // Jika dalam mode tambah, lakukan insert data baru
        $dir = uploadFile(); // Upload gambar dan mendapatkan path file
        $sql = "INSERT INTO objek_wisata VALUES (NULL, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi", $_POST['nama_wisata'], $_POST['keterangan'], $_POST['deskripsi'], $dir, $_POST['id_kategori']);
    }

    // Menjalankan query SQL
    if (mysqli_stmt_execute($stmt)) {
        header('Location: wisata.php'); // Redirect ke halaman daftar wisata setelah berhasil menyimpan
    } else {
        echo '<script>alert("Gagal Menambahkan");</script>'; // Menampilkan alert jika gagal
    }
}

// Mengakhiri output buffering
ob_end_flush();

// Menyertakan file footer
require_once 'footer.php';
?>

<script type="text/javascript">
    // Menandai menu yang aktif di navbar
    $('.nav-link').removeClass('active');
    $('.menu-wisata').addClass('active');
</script>