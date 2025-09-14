<?php

$user = 'root';
$password = 'pulamek_2023';
$database = 'mraweb';

$conn = new mysqli('localhost', $user, $password, $database); 

if ($conn === false) {
    die("connection error");
}
?>
