<?php
    require_once '../include/koneksi.php';
    $sql = "DELETE FROM tb_gallery WHERE id_gallery='".$_GET['id_gallery']."'";
    $query = mysqli_query($conn, $sql);
    if($query) {
        header  ('location: gallery.php');
    }
?>