


<?php 
  session_start();
?> 
           
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div>
                
            <a class="navbar-brand" href="#">
                <img src="img/1707387675660.png" width="60" height="55" alt="">
                <span>Healthy Oasis</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <!-- <a class="nav-link" href="#">Home</a> -->
                </li>
                <li class="nav-item">
                  <!-- <a class="nav-link" href="#">Features</a> -->
                </li>
                <li class="nav-item">
                  <!-- <a class="nav-link" href="#">Pricing</a> -->
                </li>
              </ul>
              
                
              <div class="navbuttons">
                    
                <div class="search">
                    <input type="text">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                </div>

                <?php
                if (isset($_SESSION["u_id"])){
                ?>
                
                <div class="cartBtn">
                  <a href="cart.php"><span class="material-symbols-outlined">shopping_cart</span></a>
                  <span class="cartCount">99+</span>
                </div>

                <div class="acntBtn">
                  <span class="session-username" style="font-size:larger;"><?php echo $_SESSION["username"]; ?></span>
                  <span class="material-symbols-outlined">person</span>

                  <div id="acntPopup">
                    <a href="">Profile</a>
                    <a href="">Settings</a>
                    <a href="php_functions/logout_func.php">Logout</a>
                  </div>
                </div>
                <?php
                }else {
                ?>

                <a href="login.php" id="logWhite">Log In</a>
                <a href="signup.php" class="highlight">Sign Up</a>

                <?php
                }
                ?>

            </div>
            </div>

            <div class="line-color">&nbsp;</div>
        </nav>