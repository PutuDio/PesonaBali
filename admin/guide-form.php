<?php
require_once 'header.php';
require_once '../include/koneksi.php';

$id_guide = $_GET['id_guide'] ?? null;
$guide = null;

if ($id_guide) {
    $stmt = $conn->prepare("SELECT * FROM tb_guide WHERE id_guide=?");
    $stmt->bind_param("i", $id_guide);
    $stmt->execute();
    $guide = $stmt->get_result()->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_guide = $_POST['nama_guide'];
    $bahasa = $_POST['bahasa'];
    $foto = $_POST['foto_old'] ?? '../img/PesonaBali.png';
    
    // Simple mock upload for photo path if provided
    if (!empty($_POST['foto_url'])) {
        $foto = $_POST['foto_url'];
    }

    if (isset($_POST['id_guide'])) {
        $stmt = $conn->prepare("UPDATE tb_guide SET nama_guide=?, bahasa=?, foto=? WHERE id_guide=?");
        $stmt->bind_param("sssi", $nama_guide, $bahasa, $foto, $_POST['id_guide']);
    } else {
        $stmt = $conn->prepare("INSERT INTO tb_guide (nama_guide, bahasa, foto) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama_guide, $bahasa, $foto);
    }
    
    if ($stmt->execute()) {
        echo "<script>window.location='guide.php';</script>";
    } else {
        echo '<script>alert("Failed to save.");</script>';
    }
}
?>

<div class="col-12">
    <div class="bg-white p-3">
        <h4>Guide Form</h4>
        <form method="post">
            <?php if ($guide) { ?>
                <input type="hidden" name="id_guide" value="<?= $guide['id_guide']; ?>">
                <input type="hidden" name="foto_old" value="<?= $guide['foto']; ?>">
            <?php } ?>

            <div class="mb-3">
                <label>Guide Name</label>
                <input type="text" name="nama_guide" placeholder="Full Name" class="form-control" value="<?= $guide['nama_guide'] ?? ''; ?>" required>
            </div>
            
            <div class="mb-3">
                <label>Languages Spoken</label>
                <input type="text" name="bahasa" placeholder="e.g. English, Japanese" class="form-control" value="<?= $guide['bahasa'] ?? ''; ?>" required>
            </div>
            
            <div class="mb-3">
                <label>Photo URL (Optional)</label>
                <input type="text" name="foto_url" placeholder="../img/PesonaBali.png" class="form-control" value="<?= $guide['foto'] ?? ''; ?>">
                <small class="text-muted">Enter image path relative to root, e.g. `../img/PesonaBali.png`</small>
            </div>

            <a href="guide.php" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

<?php require_once 'footer.php'; ?>

<script type="text/javascript">
    $('.nav-link').removeClass('active');
    $('.menu-guide').addClass('active');
</script>
