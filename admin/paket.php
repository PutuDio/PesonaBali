<?php require_once 'header.php' ?>

<div class="col-12">
    <div class="bg-white p-3">
        <h4>Tour Packages</h4>

        <?php
            require_once '../include/koneksi.php';
            $keyword = $_GET['keyword'] ?? '';
            $sql = "SELECT * FROM tb_paket";
            if (!empty($keyword)) {
                $keyword_safe = mysqli_real_escape_string($conn, $keyword);
                $sql .= " WHERE nama_paket LIKE '%$keyword_safe%'";
            }
            $query = mysqli_query($conn, $sql);
        ?>

        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="keyword" placeholder="Search package..." class="form-control" value="<?= htmlspecialchars($keyword) ?>">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="paket.php" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <a href="paket-form.php" class="custom-button mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                <path d="M.5 3l.04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2z"/>
            </svg> Add New
        </a>

        <div class="table-responsive">
            <table class="table table-striped-columns table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">PACKAGE NAME</th>
                        <th class="text-center">DESCRIPTION</th>
                        <th class="text-center">OPTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (mysqli_num_rows($query) > 0) {
                            while ($result = mysqli_fetch_assoc($query)) {
                                echo '<tr>';
                                echo '<td class="text-center">'.$result['id_paket'].'</td>';
                                echo '<td>'.$result['nama_paket'].'</td>';
                                echo '<td>'.$result['deskripsi'].'</td>';
                                echo '<td class="text-center">
                                    <a href="paket-form.php?id_paket='.$result['id_paket'].'" class="btn btn-warning btn-sm text-black">EDIT</a>
                                    <a href="paket-del.php?id_paket='.$result['id_paket'].'" class="btn btn-danger btn-sm text-black" onclick="return confirm(\'Delete this data?\');">DELETE</a>
                                </td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="4" class="text-center">No data found.</td></tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once 'footer.php' ?>

<script type="text/javascript">
    $('.nav-link').removeClass('active');
    $('.menu-paket').addClass('active');
</script>
