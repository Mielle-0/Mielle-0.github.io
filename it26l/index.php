<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Healthy Oasis</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php 
      session_start();
      require 'php_functions/connection.php';
      include 'navbar.php'; 
    ?>

    <div class="container_main">

        <div class="main">
          
            <!-- Landing Page -->
            <div class="specials">
                <h1>An oasis providing good and pleasant services</h1>
            </div>

            <div class="text-asd">
              <div class="three-text">
                <div class="text-content first">
                  <span class="material-symbols-outlined">
                    shopping_bag
                    </span>
                  <h3>Pick Up Options</h3>
                  <center><span>Skip the delivery wait and choose pick up options! Grab your order in-store for a quick stop, or use a locker for 24/7 access. Convenience and control, all at your fingertips.</span>
                  </center>
                </div>

                <div class="text-content second">
                  <span class="material-symbols-outlined">
                    local_shipping
                    </span>
                  <h3>Same Day Delivery</h3>
                  <center><span>Need it now? Same day delivery is your answer. Get your purchases delivered within hours, perfect for last-minute gifts or instant gratification. Speed and satisfaction, just a click away.</span>
                  </center>
                </div>

                <div class="text-content third">
                  <span class="material-symbols-outlined">
                    masks
                    </span>
                  <h3>Health and Safety Rules</h3>
                  <center><span>Shop with confidence thanks to clear health and safety rules. From product handling to delivery protocols, these guidelines ensure everyone's well-being, giving you peace of mind and a worry-free shopping experience.</span>
                  </center>  
                </div>

                <div class="text-separator-one">&nbsp;</div>
                <div class="text-separator-two">&nbsp;</div>
              </div>
            </div>


            <!-- Carousel -->

            <div id="carouselExampleCaptions" class="carousel slide">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="img/carousel-temp (1).jpg" class="c-item d-block w-100" alt="...">
                  <div class="carousel-caption">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="img/carousel-temp (2).jpg" class="c-item d-block w-100" alt="...">
                  <div class="carousel-caption">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="img/carousel-temp (3).jpg" class="c-item d-block w-100" alt="...">
                  <div class="carousel-caption">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>

            <!-- Categories Section -->
            <div class="categories" id="categ">
              <h2>Categories</h2>
              <hr>
              <div class="categ-items">

                <?php

                  $result = $db->query("SELECT c_name FROM t_categ");

                  if ($result->num_rows > 0){

                    $count = 1;
                    while($row = $result->fetch_assoc()){

                      echo '<h4 data-item="'.$count.'" class="categ-btn';
                      if ($count == 1)
                      echo ' active';
                      echo '">'.$row["c_name"].'</h4>';
                      $count++;
                    }
                  }

                ?>


              </div>

              <div class="categ-selection">

                <?php

                  $q = "SELECT p_name, p_unitOfMeasure, p_price FROM t_products WHERE c_id = 1";
                  $result = $db->query($q);

                  while($row = $result->fetch_assoc()){

                    echo
                    '
                    <div class="selection-item">
                      <img src="img/placeholder.jpg" alt="">
                      <a href="">'.$row["p_name"].'</a>
                      <span>₱'.$row["p_price"].' / '.$row["p_unitOfMeasure"].'</span>
                      <div class="quantity-adjust">
                        <span class="material-symbols-outlined">remove</span>
                        <span class="counter">1</span>
                        <span class="material-symbols-outlined">add</span> 
                      </div>
                      <button>
                        <span class="material-symbols-outlined">
                        shopping_cart
                        </span>
                        <span>Add to Cart</span>
                      </button>
                    </div>';
                  }
                ?>

                <!-- <div class="selection-item">
                  <img src="img/placeholder.jpg" alt="">
                  <a href="">Egg</a>
                  <span>₱7.00</span>
                  <div class="quantity-adjust">
                    <span class="material-symbols-outlined">remove</span>
                    <span class="counter">1</span>
                    <span class="material-symbols-outlined">add</span> 
                  </div>
                  <button>
                    <span class="material-symbols-outlined">
                    shopping_cart
                    </span>
                    <span>Add to Cart</span>
                  </button>
                </div> -->

              </div>
            </div>
        


            <div class="footer">

              <div class="brand">
                <h1>Healthy Oasis</h1>
              </div>

              <div class="links">
                <h3>Links</h3>
                <a href="#carouselExampleCaptions">Promos</a>
                <a href="#categ">Categories</a>
              </div>

              <div class="customer-service">
                <h3>Customer Service</h3>
                <a href="">Help & Support</a>
                <a href="">Delivery & Returns</a>
                <a href="">Terms & Condition</a>
              </div>

              <div class="soc-med">
                <h3>Social Media</h3>
                <img src="img/icons8-facebook.svg" alt="">
                <img src="img/icons8-instagram.svg" alt="">
                <img src="img/icons8-twitterx.svg" alt="">
              </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> 
    <script src="js/testscript.js"></script>
</body>
</html>
