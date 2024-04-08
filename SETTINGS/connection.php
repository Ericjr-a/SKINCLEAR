<?php
define("MY_SERVER", "Skinclear");
define("USERNAME", "root");
define("PASSWORD", "1QliCnj7Zyh+");
define("DATABASE", "skinclear");

$connection = mysqli_connect(MY_SERVER, USERNAME, PASSWORD, DATABASE);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

