<?php
include "koneksi.php";
 
	if(isset($_GET['page'])){
		$page = $_GET['page'];
 
		switch ($page) {
			case 'home':
				include "home.php";
				break;
			case 'login':
				include "login.php";
				break;					
			case 'register':
				include "register.php";
				break;
			case 'isiulang':
				include "isi_ulang.php";
				break;
			case 'peralatan':
				include "peralatan.php";
				break;
			case 'registrasi':
				include "registrasi.php";
				break;
			case 'add_keranjang':
				include "add_keranjang.php";
				break;

			case 'detail_produk':
				include "detail_produk.php";
				break;
			case 'about_us':
				include "about_us.php";
				break;	
			case 'cara_bayar':
				include "cara_bayar.php";
				break;	
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		}
	}else{
		include "home.php";
	}
?>