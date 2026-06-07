<?php 
require_once 'header.php';
require_once '../include/koneksi.php';
?>

<?php 
    if(isset($_GET['id_gallery'])) {
        $sql = "SELECT * FROM tb_gallery WHERE id_gallery='".$_GET['id_gallery']."'";
        $query = mysqli_query($conn, $sql);
        $gallery = mysqli_fetch_assoc($query);
    }
?>


<div class="col-12">
    <div class="bg-white p-3">
        <h4>Gallery Form</h4>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" name="nama" placeholder="Name" class="form-control" value="<?= isset($_GET['id_gallery']) ? $gallery['nama']:''; ?>" required>
            </div> 
            <div class="mb-3">
                <label class="form-label">Picture Obyek</label>
                    <?= isset($_GET['id_gallery']) ? '<div class= "mb-3"><img src="'.$gallery['foto'].'" width="200px"></div>' :''; ?>
                <input class="form-control" type="file" name="foto" required>
            </div>
            <a href="gallery.php" class="btn btn-success">Kembali</a>
            <button type="submit" class="btn btn-primary ">Simpan</button>
        </form>
    </div>
</div>

<?php
    function uploadFile(){
    $tmp_dir = $_FILES['foto']['tmp_name'];
    $tar_dir = '../img/'.$_FILES['foto']['name'];
    move_uploaded_file($tmp_dir, $tar_dir);
    return $tar_dir;
    }
    if(sizeof($_POST) > 0) {
    if(isset($_POST['id_gallery'])){
        $dir = uploadFile();
        $sql = "UPDATE tb_gallery SET nama = '".$_POST['nama']."',  gambar ='".$dir."' ";
    }else{
        $dir = uploadFile();
        $sql = "INSERT INTO tb_gallery VALUES ('', '".$_POST['nama']."', '".$dir."')";
    }
    if($query = mysqli_query($conn, $sql)) {
        header('location: gallery.php');
    } else {
        echo '<script>alert("Gagal Menambahkan");</script>';
    }
    }
?>

<?php require_once 'footer.php' ?>

<script type="text/javascript">
    $('.nav-link').removeClass('active');
    $('.menu-gallery').addClass('active');
</script>