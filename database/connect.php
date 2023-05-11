<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "secrett_store"; 

$connect = mysqli_connect($host, $user, $pass);
if ($connect) {
	/*echo "Database Terhubung";*/
    $is_connect = mysqli_select_db($connect, $database);
	if (!$is_connect) {
		die("Data tidak dapat terhubung" . mysqli_connect_error());
	}
}else {
    die("MYSQL Tidak Terhubung" . mysqli_connect_error());
}
?>