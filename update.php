<?php
session_start();
require_once("server.php");

$nama = $_POST["nama"];
$nim = $_POST["nim"];
$kelas = $_POST["kelas"];
$jenkel = $_POST["jenkel"];
$hobi = $_POST["hobi"];
$fklts = $_POST["fklts"];
$alamat = $_POST["alamat"];

$conn = "UPDATE user SET nama='$nama', kelas='$kelas', jenkel='$jenkel', hobi='" . implode(",",$hobi) . "', fklts='$fklts', alamat='$alamat' WHERE nim='$nim'";

if (mysqli_query($conn, $conn)) {
    mysqli_close($conn);
    $_SESSION["user_nama"] = $nama;
    echo "Data berhasil diperbarui";
    echo "<a href='logout.php'>Logout</a> | <a href='index.php'>Index</a>";
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>