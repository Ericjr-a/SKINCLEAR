<?php
define("MY_SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "SkinClear");

$connection = mysqli_connect(MY_SERVER, USERNAME, PASSWORD, DATABASE);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

