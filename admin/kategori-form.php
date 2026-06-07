<?php
require_once 'header.php';

// Kelas dasar untuk koneksi database
class BaseModel {
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "pesonabali");
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }
}

// Interface CRUD untuk memastikan setiap model punya metode standar
interface CRUDInterface {
    public function getById($id);
    public function getAll();
    public function save($data);
    public function delete($id);
}

// Kelas KategoriModel mewarisi BaseModel dan mengimplementasikan CRUDInterface
class KategoriModel extends BaseModel implements CRUDInterface {
    
    public function getById($id) {
        $sql = "SELECT * FROM tb_kategori WHERE id_kategori=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getAll() {
        $sql = "SELECT * FROM tb_kategori";
        return $this->conn->query($sql);
    }

    // Method Overloading (Menggunakan Parameter Opsional)
    public function save($data) {
        if (isset($data['id_kategori'])) {
            $sql = "UPDATE tb_kategori SET kategori=? WHERE id_kategori=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("si", $data['kategori'], $data['id_kategori']);
        } else {
            $sql = "INSERT INTO tb_kategori (kategori) VALUES (?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $data['kategori']);
        }

        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM tb_kategori WHERE id_kategori=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

// Inisialisasi model kategori
$kategoriModel = new KategoriModel();
$kategori = null;

// Jika ada id_kategori di URL, ambil datanya
if (isset($_GET['id_kategori'])) {
    $kategori = $kategoriModel->getById($_GET['id_kategori']);
}
?>

<div class="col-12">
    <div class="bg-white p-3">
        <h4>Category Form</h4>
        <form method="post">
            <?php if ($kategori) { ?>
                <input type="hidden" name="id_kategori" value="<?= $kategori['id_kategori']; ?>">
            <?php } ?>

            <div class="mb-3">
                <input type="text" name="kategori" placeholder="Category" class="form-control" value="<?= $kategori['kategori'] ?? ''; ?>" required>
            </div>

            <a href="kategori.php" class="btn btn-success">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

<?php
// Proses penyimpanan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($kategoriModel->save($_POST)) {
        header('Location: kategori.php');
    } else {
        echo '<script>alert("Gagal Menambahkan");</script>';
    }
}

require_once 'footer.php';
?>

<script type="text/javascript">
    $('.nav-link').removeClass('active');
    $('.menu-kategori').addClass('active');
</script>
