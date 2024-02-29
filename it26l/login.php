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
    ?>
    
    <div class="container">
        <section>
        
            <img src="img/Gemini_Generated_Image.jpg" class="bg">
        
            <div class="signup">
                <a href="index.php"><img src="img/1707387675660.png" alt="" width="70"></a>
                <h2>Log In</h2>
                <form action="" class="inputBox">
                    <input type="text" name="Username" placeholder="Username" id="">
                    <input type="password" name="Password" placeholder="Password" id="">
                    <input type="submit" value="Log In" id="btn">
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