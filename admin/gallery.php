<?php require_once 'header.php' ?>
<style>
        body {
            height: 1500px;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        #scrollToTopBtn, #scrollToBottomBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #212529;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .arrow {
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            display: inline-block;
        }
        .up-arrow {
            border-bottom: 10px solid #fff; 
        }
        .down-arrow {
            border-top: 10px solid #fff; 
        }
</style>

<button id="scrollToTopBtn" onclick="scrollToTop()" class="btn btn-primary">
    <i class="arrow up-arrow"></i>
</button>
<div class="col-12">
    <div class="bg-white p-3">
        <h4>Gallery</h4>

        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="cari" class="form-control" placeholder="Cari nama obyek..." 
                    value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : '' ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <a href="gallery.php" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <?php
            require_once '../include/koneksi.php';
            $cari = isset($_GET['cari']) ? mysqli_real_escape_string($conn, $_GET['cari']) : '';
            if ($cari != '') {
                $sql = "SELECT * FROM tb_gallery WHERE nama LIKE '%$cari%'";
            } else {
                $sql = "SELECT * FROM tb_gallery";
            }
            $query = mysqli_query($conn, $sql);
        ?>

        <a href="gallery-form.php" class="custom-button mb-4"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
            <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z"/>
            <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
            </svg>  Added
        </a>
        <table class="table table-striped-columns table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name Obyek</th>
                    <th class="text-center">Picture</th>
                    <th class="text-center">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($result = mysqli_fetch_assoc($query)){
                        echo '<tr>';
                        echo '<td class="text-center">'.$result['id_gallery'].'</td>';
                        echo '<td class="text-center">'.$result['nama'].'</td>';
                        echo '<td class="text-center"> <img src="'.$result['foto'].'" width="200px"></td>';
                        echo '<td class="text-center">
                                <a href="gallery-del.php?id_gallery='.$result['id_gallery'].' "class="btn btn-danger btn-sm text-black " onclick="return confirm (\'Apakah anda ingin menghapus data ini?\');"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg> DELETE</a>
                            </td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<button id="scrollToBottomBtn" onclick="scrollToBottom()" class="btn btn-primary">
    <i class="arrow down-arrow"></i>
</button>

<?php require_once 'footer.php' ?>

<script type="text/javascript">
    $('.nav-link').removeClass('active');
    $('.menu-gallery').addClass('active');

    window.onscroll = function() { scrollFunction() };
        function scrollFunction() {
            var scrollToTopBtn = document.getElementById("scrollToTopBtn");
            var scrollToBottomBtn = document.getElementById("scrollToBottomBtn");
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollToTopBtn.style.display = "block";
            } else {
                scrollToTopBtn.style.display = "none";
            }
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                scrollToBottomBtn.style.display = "none";
            } else {
                scrollToBottomBtn.style.display = "block";
            }
        }

        function scrollToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        function scrollToBottom() {
            window.scrollTo(0, document.body.scrollHeight);
        }
</script>