<?php
/** using mysqli_connect for database connection */

$database_Host = "localhost";
$database_Name = "crud_db";
$database_Table = "tabel_user";
$database_Username = "root";
$database_Password = "";

$mysqli = mysqli_connect($database_Host, $database_Username, $database_Password, $database_Name);
if (!$mysqli)
	die("Gagal Koneksi");
echo "Koneksi ke Database Berhasil";
echo "<br> Nama Host : ".$database_Host;
echo "<br> Nama Database : ".$database_Name;
echo "<br> Nama Tabel : ".$database_Table;
echo "<br>";
?>