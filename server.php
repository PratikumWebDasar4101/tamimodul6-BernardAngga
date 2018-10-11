<?php
$servername = "webdas.com";
$username = "root";
$password = "";
$db_name = "webdas";
$conn = mysqli_connect($servername,$username,$password,$db_name);
if (!$conn) {
    die("Gagal: " . mysqli_connect_error());
}
?>