<?php require_once 'header.php' ?>

<style>
.gallery {
  margin-top: 30px;
  margin-bottom: 30px;
}
.gallery .card {
  margin-top: 20px;
  margin-bottom: 10px;
  border-radius: 30px;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
  cursor: pointer;
}
.gallery .card img {
  border-radius: 20px;
  transition: 0.5s;
}
.gallery .card img:hover {
  transform: scale(1.1);
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