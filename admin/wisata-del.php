<?php
    require_once '../include/koneksi.php';
    $sql = "DELETE FROM objek_wisata WHERE id_wisata='".$_GET['id_wisata']."'";
    $query = mysqli_query($conn, $sql);
    if($query) {
        header  ('location: wisata.php');
    }
?>