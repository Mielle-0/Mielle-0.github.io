<?php

$db = new mysqli('localhost','root', '', 'test');

if ($db->connect_error){
    die('Connection interrupted...');
}
?>