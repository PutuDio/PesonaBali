<?php
require_once '../include/koneksi.php';
$id_guide = $_GET['id_guide'];
$stmt = $conn->prepare("DELETE FROM tb_guide WHERE id_guide=?");
$stmt->bind_param("i", $id_guide);
if($stmt->execute()) {
    header('location: guide.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
