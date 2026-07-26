<?php require_once 'header.php' ?>

<div class="col-12">
    <div class="bg-white p-3">
        <h4>Tour Guides</h4>

        <?php
            require_once '../include/koneksi.php';
            $keyword = $_GET['keyword'] ?? '';
            $sql = "SELECT * FROM tb_guide";
            if (!empty($keyword)) {
                $keyword_safe = mysqli_real_escape_string($conn, $keyword);
                $sql .= " WHERE nama_guide LIKE '%$keyword_safe%' OR bahasa LIKE '%$keyword_safe%'";
            }
            $query = mysqli_query($conn, $sql);
        ?>

        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="keyword" placeholder="Search guide or language..." class="form-control" value="<?= htmlspecialchars($keyword) ?>">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="guide.php" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <a href="guide-form.php" class="custom-button mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg> Add New
        </a>

        <div class="table-responsive">
            <table class="table table-striped-columns table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">PHOTO</th>
                        <th class="text-center">GUIDE NAME</th>
                        <th class="text-center">LANGUAGES</th>
                        <th class="text-center">OPTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (mysqli_num_rows($query) > 0) {
                            while ($result = mysqli_fetch_assoc($query)) {
                                echo '<tr>';
                                echo '<td class="text-center">'.$result['id_guide'].'</td>';
                                echo '<td class="text-center"><img src="'.$result['foto'].'" alt="'.$result['nama_guide'].'" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;"></td>';
                                echo '<td>'.$result['nama_guide'].'</td>';
                                echo '<td>'.$result['bahasa'].'</td>';
                                echo '<td class="text-center">
                                    <a href="guide-form.php?id_guide='.$result['id_guide'].'" class="btn btn-warning btn-sm text-black">EDIT</a>
                                    <a href="guide-del.php?id_guide='.$result['id_guide'].'" class="btn btn-danger btn-sm text-black" onclick="return confirm(\'Delete this data?\');">DELETE</a>
                                </td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="5" class="text-center">No data found.</td></tr>';
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
    $('.menu-guide').addClass('active');
</script>
