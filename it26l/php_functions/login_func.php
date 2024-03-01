<?php

session_start();

if (isset($_SESSION["u_id"])){

    header("Location: ../");
    exit();
}

if (isset($_SESSION["login_error"]))
    unset($_SESSION["login_error"]);

require 'connection.php';

try {
    
    if ($db->connect_error) 
        throw new Exception();

    $sql = "CALL `checkLogin`('".$_GET["username"]."', '".$_GET["password"]."');";

    $result = $db->query($sql);
    
        if ($result->num_rows != 1)
            throw new Exception();


        else 
            while($row = $result->fetch_assoc())
                $_SESSION["u_id"] = $row["u_id"];

    $_SESSION["username"] = $_GET["username"];
    header("Location: ../");
    exit();

} catch (\Throwable $th) {

    // echo $th;
    $_SESSION["login_error"] = true;
    header("Location: ../login.php");
    exit();
}

?>