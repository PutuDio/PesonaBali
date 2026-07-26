<?php require_once 'header.php' ?>

<style>
/* Guide Page Styles */
.guide-section {
  padding: 100px 0;
  background: var(--light-gray);
  min-height: 80vh;
}
.guide-section .card {
  border-radius: var(--border-radius);
  border: none;
  box-shadow: var(--shadow-sm);
  overflow: hidden;
  transition: var(--transition);
  margin-bottom: 30px;
  background: var(--white);
  text-align: center;
  padding-bottom: 20px;
}
.guide-section .card:hover {
  transform: translateY(-10px);
  box-shadow: var(--shadow-lg);
}
.guide-img-container {
    padding: 30px 30px 10px 30px;
}
.guide-img-container img {
  width: 150px;
  height: 150px;
  object-fit: cover;
  border-radius: 50%;
  border: 5px solid var(--light-gray);
  box-shadow: var(--shadow-md);
  transition: var(--transition);
}
.guide-section .card:hover img {
    transform: scale(1.05);
    border-color: rgba(255, 122, 0, 0.2);
}
.guide-section h4 {
    font-weight: 800;
    color: var(--dark-color);
    margin-top: 15px;
    margin-bottom: 5px;
}
.guide-section .lang {
    color: var(--primary-color);
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 15px;
}
.guide-section p {
    color: var(--text-gray);
    font-size: 15px;
    padding: 0 20px;
}
</style>

<section class="guide-section" id="guide">
  <div class="container">
    <div class="main-txt">
      <h1>Our <span>Guides</span></h1>
    </div>
    <div class="row mt-5">
      <?php
          require_once '../include/koneksi.php';
          $sql = "SELECT * FROM tb_guide";
          $query = mysqli_query($conn, $sql);
          if (mysqli_num_rows($query) > 0) {
              while ($result = mysqli_fetch_assoc($query)) {
        ?>
          <div class="col-md-4">
            <div class="card">
              <div class="guide-img-container">
                 <img src="<?= $result['foto'] ?: '../img/PesonaBali.png'; ?>" class="img-fluid" alt="<?= $result['nama_guide']; ?>">
              </div>
              <h4><?= $result['nama_guide']?></h4>
              <div class="lang"><i class="fas fa-language"></i> <?= $result['bahasa']?></div>
              <p>Ready to make your trip to Bali unforgettable and assist you with the best insights.</p>
            </div>
          </div>
        <?php
              }
          } else {
              echo '<div class="col-12 text-center"><p>No guides available at the moment.</p></div>';
          }
      ?>
    </div>
  </div>
</section>

<?php require_once 'footer.php' ?>

<script type="text/javascript">
    $('.nav-link').removeClass('active');
    $('.menu-guide').addClass('active');
</script>
