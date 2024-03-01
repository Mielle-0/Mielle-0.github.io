<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Log In - Healthy Oasis</title>
</head>
<body>

    <?php 
      session_start();

      if (isset($_SESSION["u_id"])){
        header("Location: ../it26l/");
        exit();
        }
    ?>
    
    <div class="container">
        <section>
        
            <img src="img/Gemini_Generated_Image.jpg" class="bg">
        
            <div class="signup">
                <a href="index.php"><img src="img/1707387675660.png" alt="" width="70"></a>
                <h2>Log In</h2>
                <form action="php_functions/login_func.php" method="GET" class="inputBox">
                    <input type="text" name="username" placeholder="Username" id="">
                    <input type="password" name="password" placeholder="Password" id="">
                    <input type="submit" value="Log In" id="btn">
                    <span class="form-error email-err" id="login-error">Invalid Credentials. Try Again</span>
                </form>
                
                <div class="group">
                    <!-- <a href="">Forget Password</a> -->
                    <a href="login.php">Forgot Password?</a> <br>
                    <a href="signup.php">Create Account</a>
                </div>
            </div>
        </section>
    </div>
</body>
</html>