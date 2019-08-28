<!DOCTYPE html>
<html>
<head>
	<title>
		Tambah User
	</title>
	<style>
		.button {
  display: inline-block;
  border-radius: 5px;
  background-color: hsl(0, 100%, 75%);
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 10px;
  width: 120px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

.update {
  display: inline-block;
  border-radius: 5px;
  background-color: hsl(0, 100%, 75%);
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 14px;
  padding: 8px;
  width: 80px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

	</style>
</head>
<body>
	<a href="index.php" class="button" style="vertical-align:middle"><span>Go to Home </span>
	</a>

	<form action="tambah.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Mobile</td>
				<td><input type="text" name="mobile"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr>
				<td>Foto</td>
				<td><input type="file" name="foto"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="update" name="Kirim" value="Tambah" style="vertical-align:middle"> </td>
			</tr>
		</table>
	</form>

<?php 
if (isset($_POST['Kirim'])) {
	$nama = $_POST['nama'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat']; 

	$foto = @$_FILES['foto']['name'];
	$folderFoto="gambar";
	
	if(!is_dir($folderFoto)); 
		// mkdir($folderFoto);
	
	$fileTujuanFoto = $folderFoto."/".$foto;
	if (strlen($foto)>0) {
		if (is_uploaded_file($_FILES['foto']['name'])) {
			move_uploaded_file($_FILES['foto']['name'], $fileTujuanFoto);
		}
	}

	include_once("koneksi.php");

	$result = mysqli_query($mysqli, "INSERT INTO
		tabel_user(nama, mobile, email, alamat, foto) VALUES 
		('$nama', '$mobile', '$email', '$alamat', '$foto')");
	
	echo "Biodata user telah ditambahkan, Thx u next.
		<a href='index.php'> Lihat Data User</a>";
}

?>

</body>
</html>