<?php 

include_once("koneksi.php");

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$nama = $_POST['nama'];	
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];

	$result = mysqli_query($mysqli, "UPDATE tabel_user SET
		nama='$nama',mobile='$mobile',email='$email',alamat='$alamat' WHERE id = $id");

	header("Location:index.php");
}
?>

<?php 
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM tabel_user WHERE id=$id");

while ($user_data = mysqli_fetch_array($result)) 
{
	$nama = $user_data['nama'];
	$mobile = $user_data['mobile'];
	$email = $user_data['email'];
	$alamat = $user_data['alamat'];
}
 ?>

 <html>
 <head>
 	<title>Edit User Data</title>
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
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 4px;
}
</style>
 </head>
 <body>
 	
	<br> 
	<a href="index.php" class="button" style="vertical-align:middle"><span>Go to Home</span>
	</a>


 	<form name="update_user" method="post" action="edit.php">
 		<table border="0">
 			<h3>Update Data</h3>
 			<tr>
 				<td>Nama</td>
 				<td>
 					<input type="text" name="nama" value=<?php echo $nama;?>>
 				</td>
 			</tr>
 			<tr>
 				<td>Mobile</td>
 				<td>
 					<input type="text" name="mobile" value=<?php echo $mobile;?>>
 				</td>
 			</tr>
 			<tr>
 				<td>Email</td>
 				<td>
 					<input type="text" name="email" value=<?php echo $email;?>>
 				</td>
 			</tr>
 			<tr>
 				<td>Alamat</td>
 				<td>
 					<input type="text" name="alamat" value=<?php echo $alamat;?>>
 				</td>
 			</tr>
 			<tr>
 				<td>
 					<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
 				</td>
 				<!-- <td><input type="submit" name="update" value="Update"></td> -->
 				<br> 
				<td><input type="submit" class="update" name="update" value="Update" style="vertical-align:middle">
				</td>
 			</tr>
 		</table>
 	</form>
 </body>
 </html>