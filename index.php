<?php

include_once("koneksi.php");
// memanggil file koneksi.php agar dapat terhubung antara database dan file

$hasil = mysqli_query
($mysqli, "SELECT * FROM tabel_user ORDER BY id DESC");

//hasil merupakan nama variabel yang memiliki nilai yaitu mysqli_query dimana mysqli query
//akan mengeksekusi perintah sql yaitu "SELECT * FROM user ORDER BY id DESC" user merupakan
//nama table yang ada di database.
?>

<html>
<head>
	<title>
		Homepage
	</title>
	<style type="">
	
		th {background-color: rgb(184, 216, 255);}
		tr {background-color: rgba(255, 90, 71, 0.2);}
		tr:hover {background-color: hsl(0, 100%, 75%);}

.tambah {
  display: inline-block;
  border-radius: 5px;
  background-color: rgb(184, 216, 255);
  border: none;
  color: black;
  text-align: center;
  font-size: 16px;
  padding: 10px;
  width: 140px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.tambah span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.tambah span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}


	</style>
</head>
<body>
	<br>
	<!-- <a href="tambah.php">Tambah User Baru</a><br><br> -->
	<a href="tambah.php" class="tambah" style="vertical-align:middle"><span><b> + Tambah User Baru </b></span> </a>
	<br>
	<br>
	<table width = '80%' border=0>
	<tr>
		<th>Foto</th><th>Nama</th><th>Mobile</th><th>Email</th><th>Alamat</th>
		<th colspan="2">Action</th>
	</tr>
	<?php

	while ($user_data = mysqli_fetch_array($hasil)) {
		echo "<tr>";
		echo "<td align='center'><img src='gambar/download.png".$user_data['foto']."' width='80'
height='80'></td>";
		echo "<td>".$user_data['nama']."</td>";
		echo "<td>".$user_data['mobile']."</td>";
		echo "<td>".$user_data['email']."</td>";
		echo "<td>".$user_data['alamat']."</td>";
		echo "<td><a href='edit.php?id=$user_data[id]'>Edit </a></td>";
		echo "<td><a href='hapus.php?id=$user_data[id]'>Hapus</a></td></tr>";
	}
	?>
</table>
</body>
</html>
