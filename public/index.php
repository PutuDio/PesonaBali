<?php
$page = "home";
require_once 'header.php';
?>


    <div class="home" id="home">
      <div class="content">
        <h5>Welcome To BALI</h5>
        <h1>Visit <span class="changecontent"></span></h1>
        <p>Bali is a place that everyone wants to visit to enjoy its beauty.</p>
        <a href="book.php">Book Place</a>
      </div>
    </div>


    <section class="about" id="about">
      <div class="container">
        <div class="main-txt">
          <h1>About <span>BALI</span></h1>
        </div>
        <div class="row" style="margin-top: 50px">
          <div class="col-md-6 py-3 py-md-0">
            <div class="card">
              <img src="../img/Bali (2).jpg" alt="" />
            </div>
          </div>
          <div class="col-md-6 py-3 py-md-0">
            <p class="mb-4">
                The island of Bali, also known as the Island of the Gods, is a famous tourist destination in Indonesia and is internationally 
            recognized. Bali Island is located between Java Island and Lombok Island. In 1958, Bali officially became its own province with
            Singaraja as its capital. The majority of Bali's population is indigenous, the Balinese, whose rich culture is recognized 
            worldwide. Balinese people adhere to the Tri Hita Karana philosophy of life which contains three elements that build balance and
            harmony between man and God, man and man, and man and nature.
            </p>
            <p>
                Bali is an international tourist destination known by the nicknames "Island of the Gods" and "Island of a Thousand Temples". 
            The island offers natural beauty, cultural diversity, and the hospitality of its people. With this, Bali has become an 
            attractive tourist destination for travelers from all over the world. The island also has a rich history and a tropical climate 
            that influences tourism in the region.
            </p>
          </div>
        </div>
      </div>
    </section>


    <section class="services" id="services">
      <div class="container">
        <div class="main-txt">
          <h1><span>S</span>ervices</h1>
        </div>
        <div class="row" style="margin-top: 30px">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-location-dot"></i>
              <div class="card-body text-center">
                <h3>Affordable Place</h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-utensils"></i>
              <div class="card-body text-center">
                <h3>Food & Drinks</h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-bullhorn"></i>
              <div class="card-body text-center">
                <h3>Safty Guide</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="margin-top: 30px">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-car"></i>
              <div class="card-body text-center">
                <h3>Transportation</h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-running"></i>
              <div class="card-body text-center">
                <h3>Fastest Travel</h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-hiking"></i>
              <div class="card-body text-center">
                <h3>Adventures</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


<?php require_once 'footer.php' ?>