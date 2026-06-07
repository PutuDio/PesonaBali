<?php
    require_once '../include/koneksi.php';
    $sql = "DELETE FROM tb_kategori WHERE id_kategori='".$_GET['id_kategori']."'";
    $query = mysqli_query($conn, $sql);
    if($query) {
        header  ('location: kategori.php');
    }
?>