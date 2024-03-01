<?php


// echo "test123";
session_start();

// echo "test0";
require 'connection.php';


// echo "test1";

// // remove all session variables
session_unset();


// echo "test2";

// // destroy the session
session_destroy();

// echo "test3";

header("Location: ../");
exit();

?>