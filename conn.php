<?php

$user = 'root';
$password = '';
$database = 'mraweb';

$conn = new mysqli('localhost', $user, $password, $database); 

if ($conn === false) {
    die("connection error");
}

?>