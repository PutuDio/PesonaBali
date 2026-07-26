<?php
require_once '../include/koneksi.php';
$id_paket = $_GET['id_paket'];
$stmt = $conn->prepare("DELETE FROM tb_paket WHERE id_paket=?");
$stmt->bind_param("i", $id_paket);
if($stmt->execute()) {
    header('location: paket.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
