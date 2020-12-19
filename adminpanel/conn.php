<?php

$conn = new mysqli('localhost', 'root', '', 'bhoklagyo');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>