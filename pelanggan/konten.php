<?php
include "../koneksi.php";
 
	if(isset($_GET['page'])){
		$page = $_GET['page'];
 
		switch ($page) {
			case 'home':
				include "home.php";
				break;
			case 'isiulang':
				include "isi_ulang.php";
				break;
			case 'peralatan':
				include "peralatan.php";
				break;

			case 'keranjang':
				include "keranjang.php";
				break;
			case 'add_keranjang':
				include "tambah_keranjang.php";
				break;
			case 'edit_keranjang':
				include "edit_keranjang.php";
				break;
			case 'hapus_keranjang':
				include "hapus_keranjang.php";
				break;
			case 'edit_alamat_kirim':
				include "edit_alamat_kirim.php";
				break;

					

			case 'pesanan_saya':
				include "pesanan_saya.php";
				break;
			case 'pembayaran':
				include "pembayaran.php";
				break;
			case 'detail_order':
				include "detail_order.php";
				break;		
			case 'detail_produk':
				include "detail_produk.php";
				break;
			case 'konfirmasi_pesanan':
				include "konfirmasi_pesanan.php";
				break;
			case 'cara_bayar':
				include "cara_bayar.php";
				break;	

			case 'akun':
				include "akun.php";
				break;
			case 'edit_akun':
				include "edit_akun.php";
				break;
	
			case 'chat':
				include "chat.php";
				break;
			case 'tukar_poin':
				include "tukar_poin.php";
				break;
	
			case 'logout':
				include "logout.php";
				break;
					
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		}
	}else{
		include "home.php";
	}
?>