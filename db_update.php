<?php
require_once 'include/koneksi.php';

// 1. Create tb_guide
$sql_guide = "CREATE TABLE IF NOT EXISTS `tb_guide` (
  `id_guide` int(11) NOT NULL AUTO_INCREMENT,
  `nama_guide` varchar(100) NOT NULL,
  `bahasa` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_guide`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $sql_guide) or die(mysqli_error($conn));

// 2. Create tb_paket
$sql_paket = "CREATE TABLE IF NOT EXISTS `tb_paket` (
  `id_paket` int(11) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $sql_paket) or die(mysqli_error($conn));

// 3. Alter book table to add id_guide and id_paket
$sql_alter_book1 = "ALTER TABLE `book` ADD `id_guide` int(11) NULL AFTER `location`;";
$sql_alter_book2 = "ALTER TABLE `book` ADD `id_paket` int(11) NULL AFTER `id_guide`;";
// Ignoring errors if columns already exist
@mysqli_query($conn, $sql_alter_book1);
@mysqli_query($conn, $sql_alter_book2);

// Optionally add some dummy data for tb_paket and tb_guide if empty
$check_paket = mysqli_query($conn, "SELECT * FROM tb_paket");
if(mysqli_num_rows($check_paket) == 0) {
    mysqli_query($conn, "INSERT INTO tb_paket (nama_paket, deskripsi) VALUES ('Paket 3 Tempat (Ubud, Kintamani, Penglipuran)', 'Jelajahi keindahan budaya dan alam pegunungan di tengah Bali.')");
    mysqli_query($conn, "INSERT INTO tb_paket (nama_paket, deskripsi) VALUES ('Paket 4 Tempat (Uluwatu, GWK, Padang Padang, Jimbaran)', 'Paket wisata yang berfokus pada area pantai, sunset, dan seafood di selatan Bali.')");
}

$check_guide = mysqli_query($conn, "SELECT * FROM tb_guide");
if(mysqli_num_rows($check_guide) == 0) {
    mysqli_query($conn, "INSERT INTO tb_guide (nama_guide, bahasa, foto) VALUES ('Bli Wayan', 'English, Indonesian', '../img/PesonaBali.png')");
    mysqli_query($conn, "INSERT INTO tb_guide (nama_guide, bahasa, foto) VALUES ('Gungde', 'Japanese, English', '../img/PesonaBali.png')");
}

echo "Database successfully updated!\n";
?>
