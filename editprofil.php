<?php
require_once("server.php");
session_start();

if(isset($_SESSION["user_nim"])) {
	$nim = $_SESSION["user_nim"];
    $sql = "SELECT * FROM user WHERE nim=$nim";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dokumen</title>
</head>
<body>
<header>
    <table align="center">
    <td align="center">
    <a href="index.php">Awal</a> -
    <a href="daftarposting.php">List Posting</a> - 
    <a href="semuaposting.php">Semua Posting</a> - 
    <a href="editprofil.php">Edit Profil</a> - 
    <a href="posting.php">Posting</a> - 
    <a href="logout.php">Logout</a>
    </td>
    </table>
    </header>
<form action="update.php" method="post">
        <table>
			<tr>
				<td>Edit Profil</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>
                    <input type="text" name="nama" value="<?php echo $row["nama"] ?>">
                    <?php if(isset($_SESSION["pesan_nama"])) { ?>
                    <p><?php echo $pesan_nama ?></p>
                    <?php } ?>
                </td>
			</tr>
			<tr>
				<td>NIM</td>
				<td>
                    <input type="text" value="<?php echo $row["nim"] ?>" disabled>
                </td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>
					<input type="radio" name="kelas" value="1" <?php if($row["kelas"] == 1):echo "checked"; endif ?>>4101
					<input type="radio" name="kelas" value="2" <?php if($row["kelas"] == 2):echo "checked"; endif ?>>4102
					<input type="radio" name="kelas" value="3" <?php if($row["kelas"] == 3):echo "checked"; endif ?>>4103
					<input type="radio" name="kelas" value="4" <?php if($row["kelas"] == 4):echo "checked"; endif ?>>4104
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>
					<input type="radio" name="jenkel" value="laki-laki" <?php if($row["jenkel"] == "laki-laki"):echo "checked"; endif ?>>Laki-laki
					<input type="radio" name="jenkel" value="perempuan" <?php if($row["jenkel"] == "perempuan"):echo "checked"; endif ?>>Perempuan
				</td>
			</tr>
			<tr>
				<td>Hobi</td>
                <?php $hobi = explode(",",$row["hobi"]); ?>
				<td>
					<input type="checkbox" name="hobi[]" value="Bersepeda" <?php if(in_array("Bersepeda",$hobi)):echo "checked"; endif ?>><b>Bersepeda</b>
					<input type="checkbox" name="hobi[]" value="Membaca" <?php if(in_array("Membaca",$hobi)):echo "checked"; endif ?>><b>Membaca</b>
					<input type="checkbox" name="hobi[]" value="Menulis" <?php if(in_array("Menulis",$hobi)):echo "checked"; endif ?>><b>Menulis</b>
					<input type="checkbox" name="hobi[]" value="Berenang" <?php if(in_array("Berenang",$hobi)):echo "checked"; endif ?>><b>Berenang</b>
					<input type="checkbox" name="hobi[]" value="Bermain" <?php if(in_array("Bermain",$hobi)):echo "checked"; endif ?>><b>Bermain</b><br>
				</td>
			</tr>
			<tr>
				<td>Fakultas</td>
				<td>
					<select name="fklts">
						<option <?php if($row["fklts"] == "Ilmu Terapan"):echo "selected";endif ?>>Ilmu Terapan</option>
						<option <?php if($row["fklts"] == "Rekayasa Industri"):echo "selected";endif ?>>Rekayasa Industri</option>
						<option <?php if($row["fklts"] == "Teknik Elektro"):echo "selected";endif ?>>Teknik Elektro</option>
						<option <?php if($row["fklts"] == "Industri Kreatif"):echo "selected";endif ?>>Industri Kreatif</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat" id="" cols="26" rows="1"><?php echo $row["alamat"] ?></textarea></td>
			</tr>
			<tr>
                <input type="hidden" name="nim" value="<?php echo $row["nim"] ?>">
				<td><input type="submit" name="submit" value="Kirim"></td>
			</tr>
        </table>
    </form>
</body>
</html>
<?php 
}else {
    echo "Belum Memiliki Akun";
} ?>