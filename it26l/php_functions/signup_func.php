<?php

session_start();

if (isset($_SESSION["u_id"])){
    
    header("Location: ../");
    exit();
}


require 'connection.php';

// setcookie("username", $_GET["username"], time()+3600, "/");
// setcookie("email", $_GET["email"], time()+3600, "/");
// setcookie("email", "", -1, "/"); //Remove Cookie

if (isset($_SESSION["signup_error"]))
    unset($_SESSION["signup_error"]);

$_SESSION["username"] = $_GET["username"];
$_SESSION["email"] = $_GET["email"];




try {
    
    if ($_GET["password"] != $_GET["cPassword"])
        throw new Exception();

    if (strlen($_SESSION["username"]) < 5)
        throw new Exception();

    if (strlen($_GET["password"]) < 5)
        throw new Exception();

    if ($db->connect_error) 
        throw new Exception();
    

    $sql = "INSERT INTO t_users (u_username, u_email, u_password_hash)
    VALUES ('".$_SESSION["username"]."', '".$_SESSION["email"]."', '".$_GET["password"]."')";



    if ($db->query($sql) === TRUE) {

        $result = $db->query("SELECT u_id
                            FROM t_users
                            WHERE u_username = '".$_SESSION["username"]."';");

        if ($result->num_rows != 1)
            throw new Exception();

        else 
            while($row = $result->fetch_assoc())
                $_SESSION["u_id"] = $row["u_id"];

        unset($_SESSION["email"]);

        header("Location: ../");
        exit();

    } else 
        throw new Exception();

} catch (\Throwable $th) {

    $_SESSION["signup_error"] = true;
    header("Location: ../signup.php");
    exit();
}

?>