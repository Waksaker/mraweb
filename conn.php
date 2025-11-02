<?php

$user = 'mraserver';
$password = 'mraglobal2525';
$database = 'mraweb';

$conn = new mysqli('localhost', $user, $password, $database); 

if ($conn === false) {
    die("connection error");
}
?>
