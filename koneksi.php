<?php

$server = "localhost";
$db = "barokah_depot";
$username = "root";
$password = "";

$koneksi= mysqli_connect($server,$username,$password,$db);


if(!$koneksi) {
	die("Koneksi gagal : ". mysqli_connect_error());
}
?>