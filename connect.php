<!-- initialization for connecting the database to the website -->
<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "news";

$elements = mysqli_connect($servername, $username, $password, $database) or
die('Error connecting to MySQL server.'.mysqli_connect_error());
mysqli_set_charset($elements, "utf8");
?>
