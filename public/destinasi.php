<?php require_once 'header.php' ?>


<style>
.destination {
  margin-top: 50px;
}
.destination .card{
  border-radius: 10px;
  transition: 0.5s;
  border: none;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
}
.destination .card:hover {
  transform: scale(1.1);
}
.destination .card-body a{
  padding: 10px;
  text-decoration: none;
  background: #ffa500;
  color: white;
  border-radius: 5px;
}
.destination .card-body:hover {
  transform: scale(1.1);
  transition: 0.5s;
}
.destination .card .card-body-img img{
  border-radius: 10px;
}

.font {
  text-align: justify;
  font-size: large;
  font-family: 'Times New Roman', Times, serif;
}
</style>


<section class="destination" id="destination">
  <div class="container">
    <div class="main-txt">
      <h1><span>D</span>estination</h1>
    </div>
    <div class="row" style="margin-top: 30px">
      <?php
          require_once '../include/koneksi.php';
          // Query untuk mengambil data wisata dan kategori
          $sql = "SELECT a.*, b.kategori FROM objek_wisata a JOIN tb_kategori b ON a.id_kategori = b.id_kategori";
          $query = mysqli_query($conn, $sql);
          // Loop untuk menampilkan setiap objek wisata
          while ($result = mysqli_fetch_assoc($query)) {
        ?>
          <div class="col-md-4">
            <div class="card mb-4 mt-2">
              <div class="card-body-img text-center">
                <!-- Menampilkan gambar objek wisata -->
                <img src="<?= $result['gambar']; ?>" class="img-fluid">
                <h5 class="mt-2"><?= $result['nama_wisata']?></h5>
                <?= $result['keterangan']?>

                  <!-- Tombol Detail yang membuka modal dengan data objek wisata -->
                  <button class="btn btn-link btn-sm detail" data-bs-toggle="modal" data-bs-target="#detailModal"
                  data-nama="<?= $result['nama_wisata']?>" data-deskripsi="<?= $result['deskripsi']?>" 
                  data-img="<?= $result['gambar']; ?>" data-kategori="<?= $result['kategori']; ?>">Detail</button>
                
                <!-- Link untuk menuju halaman booking -->
                <div class="card-body">
                  <a href="book.php">Book Now</a>
                </div>
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="detailModalLabel">Detail Wisata</h1>
        </div>
        <div class="modal-body">
            <h3 class="text-center mb-3" id="modal-nama"></h3> <!-- Nama wisata ditampilkan di modal -->
            <img id="modal-img" class="img-fluid"> <!-- Gambar wisata ditampilkan di modal -->
            <h6 class="text-center mt-3"><span id="modal-kategori"></span></h6> <!-- Kategori wisata ditampilkan di modal -->
            <h5 class="font" id="modal-deskripsi"></h5> <!-- Deskripsi wisata ditampilkan di modal -->
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
    $('#modal-kategori').html('"<em>' + $(this).data('kategori') + '<em>"');
    $('#modal-deskripsi').html($(this).data('deskripsi'));
    $('#detailModal').modal('show'); // Menampilkan modal
  });
});
</script>


    <?php require_once 'footer.php' ?>
