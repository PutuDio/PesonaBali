<?php require_once 'header.php' ?>

<style>
/* Destination Page Styles */
.destination {
  padding: 100px 0;
  background: var(--light-gray);
}
.destination .card {
  border-radius: var(--border-radius);
  transition: var(--transition);
  border: none;
  background: var(--white);
  box-shadow: var(--shadow-sm);
  overflow: hidden;
  height: 100%;
}
.destination .card:hover {
  transform: translateY(-10px);
  box-shadow: var(--shadow-lg);
}
.destination .card-body-img {
    padding: 15px;
}
.destination .card-body-img img{
  border-radius: 12px;
  width: 100%;
  height: 250px;
  object-fit: cover;
  transition: var(--transition);
}
.destination .card:hover .card-body-img img {
  transform: scale(1.05);
}
.destination h5 {
    font-weight: 700;
    font-size: 20px;
    margin-top: 15px;
    color: var(--dark-color);
}
.destination p {
    color: var(--text-gray);
    font-size: 15px;
    margin-bottom: 10px;
}
.destination .btn-detail {
    color: var(--primary-color);
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition);
    padding: 0;
}
.destination .btn-detail:hover {
    color: var(--primary-hover);
}
.destination .card-body {
    padding: 0 15px 25px 15px;
    text-align: center;
}
.destination .card-body a {
  padding: 12px 30px;
  text-decoration: none;
  background: var(--primary-color);
  color: var(--white);
  border-radius: 30px;
  font-weight: 600;
  display: inline-block;
  transition: var(--transition);
  box-shadow: 0 4px 15px rgba(255, 122, 0, 0.3);
}
.destination .card-body a:hover {
  background: var(--primary-hover);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(255, 122, 0, 0.4);
}

/* Modal Styling */
.modal-content {
    border-radius: var(--border-radius);
    border: none;
    box-shadow: var(--shadow-lg);
}
.modal-header {
    border-bottom: 1px solid #f1f1f1;
    padding: 20px 30px;
}
.modal-title {
    font-weight: 700;
}
.modal-body {
    padding: 30px;
}
.modal-body img {
    border-radius: 12px;
    margin-bottom: 20px;
    width: 100%;
    max-height: 400px;
    object-fit: cover;
}
.modal-body h3 {
    font-weight: 800;
    color: var(--dark-color);
}
.modal-body h6 {
    color: var(--primary-color);
    font-weight: 600;
}
.font {
  text-align: justify;
  font-size: 16px;
  font-weight: 400;
  line-height: 1.8;
  color: var(--text-gray);
}
.modal-footer {
    border-top: none;
    padding: 15px 30px;
}
.btn-secondary {
    background: var(--text-gray);
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
}
</style>

<section class="destination" id="destination">
  <div class="container">
    <div class="main-txt">
      <h1><span>D</span>estination</h1>
    </div>
    <div class="row mt-4">
      <?php
          require_once '../include/koneksi.php';
          // Query untuk mengambil data wisata dan kategori
          $sql = "SELECT a.*, b.kategori FROM objek_wisata a JOIN tb_kategori b ON a.id_kategori = b.id_kategori";
          $query = mysqli_query($conn, $sql);
          // Loop untuk menampilkan setiap objek wisata
          while ($result = mysqli_fetch_assoc($query)) {
        ?>
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body-img text-center">
                <!-- Menampilkan gambar objek wisata -->
                <div style="overflow:hidden; border-radius:12px;">
                   <img src="<?= $result['gambar']; ?>" class="img-fluid">
                </div>
                <h5 class="mt-3"><?= $result['nama_wisata']?></h5>
                <p><?= $result['keterangan']?></p>

                <!-- Tombol Detail yang membuka modal dengan data objek wisata -->
                <button class="btn btn-link btn-sm btn-detail detail" data-bs-toggle="modal" data-bs-target="#detailModal"
                data-nama="<?= $result['nama_wisata']?>" data-deskripsi="<?= htmlspecialchars($result['deskripsi']) ?>" 
                data-img="<?= $result['gambar']; ?>" data-kategori="<?= $result['kategori']; ?>">View Details <i class="fas fa-arrow-right ml-1"></i></button>
              </div>
              
              <!-- Link untuk menuju halaman booking -->
              <div class="card-body">
                <a href="book.php">Book Now</a>
              </div>
            </div>
          </div>
        <?php
        }
      ?>
    </div>
  </div>

  <!-- Modal untuk menampilkan detail wisata -->
  <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="detailModalLabel">Detail Wisata</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <h3 class="mb-3" id="modal-nama"></h3> <!-- Nama wisata ditampilkan di modal -->
            <img id="modal-img" class="img-fluid shadow-sm"> <!-- Gambar wisata ditampilkan di modal -->
            <h6 class="mt-3"><span id="modal-kategori"></span></h6> <!-- Kategori wisata ditampilkan di modal -->
            <div class="font mt-4" id="modal-deskripsi"></div> <!-- Deskripsi wisata ditampilkan di modal -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <!-- Tombol untuk menutup modal -->
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Mengimpor jQuery untuk manipulasi DOM -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.detail').click(function() {// Event listener untuk tombol detail
    // Mengisi data pada modal dengan data dari tombol yang diklik
    $('#modal-img').attr('src', $(this).data('img'));
    $('#modal-nama').html($(this).data('nama'));
    $('#modal-kategori').html('<em>' + $(this).data('kategori') + '</em>');
    $('#modal-deskripsi').html($(this).data('deskripsi'));
    $('#detailModal').modal('show'); // Menampilkan modal
  });
});
</script>

<?php require_once 'footer.php' ?>
