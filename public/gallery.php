<?php require_once 'header.php' ?>

<style>
/* Gallery Page Styles */
.gallery {
  padding: 100px 0;
  background: var(--white);
}
.gallery .card {
  border-radius: var(--border-radius);
  border: none;
  box-shadow: var(--shadow-md);
  overflow: hidden;
  transition: var(--transition);
  margin-bottom: 30px;
  cursor: pointer;
}
.gallery .card:hover {
  transform: translateY(-10px);
  box-shadow: var(--shadow-lg);
}
.gallery .card-body-img {
    height: 300px;
}
.gallery .card-body-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: var(--transition);
}
.gallery .card:hover .card-body-img img {
  transform: scale(1.08);
}
</style>


<section class="gallery" id="gallery">
  <div class="container">
    <div class="main-txt">
      <h1><span>G</span>allery</h1>
    </div>
    <div class="row" style="margin-top: 30px">
      <?php
          require_once '../include/koneksi.php';
          $sql = "SELECT * FROM tb_gallery";
          $query = mysqli_query($conn, $sql);
          // Loop untuk menampilkan setiap gambar dalam gallery
          while ($result = mysqli_fetch_assoc($query)) {
        ?>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body-img">
                <img src="<?= $result['foto']; ?>"class="img-fluid">
              </div>
            </div>
          </div>
        <?php
        }
      ?>
    </div>
  </div>
</section>


<?php require_once 'footer.php' ?>

<script type="text/javascript">
    $('.nav-link').removeClass('active'); // Menghilangkan kelas 'active' dari semua link navigasi
    $('.menu-gallery').addClass('active'); // Menambahkan kelas 'active' pada menu gallery
</script>