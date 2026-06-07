<?php require_once 'header.php' ?>

<div class="col-12">
    <div class="bg-white p-3">
        <h4>Category</h4>

        <?php
            require_once '../include/koneksi.php';

            // Ambil kata kunci dari input pencarian
            $keyword = $_GET['keyword'] ?? '';

            // SQL dengan filter pencarian jika ada
            $sql = "SELECT * FROM tb_kategori";
            if (!empty($keyword)) {
                $keyword_safe = mysqli_real_escape_string($conn, $keyword); // biar aman
                $sql .= " WHERE kategori LIKE '%$keyword_safe%'";
            }

            $query = mysqli_query($conn, $sql);
        ?>

        <!-- Form pencarian -->
        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="keyword" placeholder="Cari nama wisata atau kategori..." class="form-control" value="<?= htmlspecialchars($keyword) ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <a href="kategori.php" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <a href="kategori-form.php" class="custom-button mb-4">
            <!-- tombol tambah -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                <path d="..."/>
                <path d="..."/>
            </svg> Added
        </a>

        <table class="table table-striped-columns table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">CATEGORY</th>
                    <th class="text-center">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (mysqli_num_rows($query) > 0) {
                        while ($result = mysqli_fetch_assoc($query)) {
                            echo '<tr>';
                            echo '<td class="text-center">'.$result['id_kategori'].'</td>';
                            echo '<td>'.$result['kategori'].'</td>';
                            echo '<td class="text-center">
                                <a href="kategori-form.php?id_kategori='.$result['id_kategori'].'" class="btn btn-warning btn-sm text-black">EDIT</a>
                                <a href="kategori-del.php?id_kategori='.$result['id_kategori'].'" class="btn btn-danger btn-sm text-black" onclick="return confirm(\'Apakah anda ingin menghapus data ini?\');">DELETE</a>
                            </td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="3" class="text-center">Tidak ada data ditemukan.</td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'footer.php' ?>

<script type="text/javascript">
    $('.nav-link').removeClass('active');
    $('.menu-kategori').addClass('active');
</script>
