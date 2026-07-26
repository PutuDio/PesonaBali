<?php
require_once 'header.php';
require_once '../include/koneksi.php';

$id_paket = $_GET['id_paket'] ?? null;
$paket = null;

if ($id_paket) {
    $stmt = $conn->prepare("SELECT * FROM tb_paket WHERE id_paket=?");
    $stmt->bind_param("i", $id_paket);
    $stmt->execute();
    $paket = $stmt->get_result()->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_paket = $_POST['nama_paket'];
    $deskripsi = $_POST['deskripsi'];
    
    if (isset($_POST['id_paket'])) {
        $stmt = $conn->prepare("UPDATE tb_paket SET nama_paket=?, deskripsi=? WHERE id_paket=?");
        $stmt->bind_param("ssi", $nama_paket, $deskripsi, $_POST['id_paket']);
    } else {
        $stmt = $conn->prepare("INSERT INTO tb_paket (nama_paket, deskripsi) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama_paket, $deskripsi);
    }
    
    if ($stmt->execute()) {
        echo "<script>window.location='paket.php';</script>";
    } else {
        echo '<script>alert("Failed to save.");</script>';
    }
}
?>

<div class="col-12">
    <div class="bg-white p-3">
        <h4>Package Form</h4>
        <form method="post">
            <?php if ($paket) { ?>
                <input type="hidden" name="id_paket" value="<?= $paket['id_paket']; ?>">
            <?php } ?>

            <div class="mb-3">
                <label>Package Name</label>
                <input type="text" name="nama_paket" placeholder="e.g. Paket 3 Tempat" class="form-control" value="<?= $paket['nama_paket'] ?? ''; ?>" required>
            </div>
            
            <div class="mb-3">
                <label>Description</label>
                <textarea name="deskripsi" placeholder="Description of the package..." class="form-control" required><?= $paket['deskripsi'] ?? ''; ?></textarea>
            </div>

            <a href="paket.php" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

<?php require_once 'footer.php'; ?>

<script type="text/javascript">
    $('.nav-link').removeClass('active');
    $('.menu-paket').addClass('active');
</script>
