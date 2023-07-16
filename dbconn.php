<?php


$conn = mysqli_connect("localhost", "root", "", "community");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
