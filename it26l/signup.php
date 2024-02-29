<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <style>

    </style>
    <title>Sign Up - Healthy Oasis</title>
</head>
<body>
    <?php 
      session_start(); 

      if (isset($_SESSION["u_id"])){
        header("Location: ../it26l/");
        exit();
        }else
        echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        
       
    ?>
    
    <div class="container">

        <section>

            <img src="img/Gemini_Generated_Image.jpg" class="bg">

            <div class="signup">
                <a href="index.php"><img src="img/1707387675660.png" alt="" width="70"></a>
                <h2>Sign Up</h2>

                <form action="php_functions/signup_func.php" method="GET" class="inputBox">

                    <input type="text" placeholder="Username" name="username"
                    <?php
                        if (isset($_SESSION["username"]))
                            echo " value='".$_SESSION["username"]."'";

                    ?>>
                    <input type="email" placeholder="Email" name="email"
                    <?php
                        if (isset($_SESSION["email"]))
                            echo " value='".$_SESSION["email"]."'";
                    ?>>
                    <input type="password" placeholder="Password" name="password">
                    <input type="password" placeholder="Confirm Password" name="cPassword">
                    <input type="submit" value="Create Account" id="btn">
                    <span class="form-error user-err" id="user-exists">Username already exist</span>
                    <span class="form-error user-err" id="user-short">Username too short</span>
                    <span class="form-error email-err" id="email-exists">Email already exist</span>
                    <span class="form-error email-err" id="email-invalid">Invalid email</span>
                    <span class="form-error pass-err" id="password-mismatch">Password does not match</span>
                    <span class="form-error pass-err" id="password-short">Password too short</span>
                    <span class="form-error unexpected" id="other-error">Unexpected error. Try again</span>
                </form>
                
                <div class="group">
                    <!-- <a href="">Forget Password</a> -->
                    <a href="login.php">Already have an account?</a>
                </div>
            </div>
        </section>

    </div>

</body>
</html>