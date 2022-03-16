<?php
include "../koneksi.php";
 
	if(isset($_GET['page'])){
		$page = $_GET['page'];
 
		switch ($page) {
			case 'home':
				include "home.php";
				break;

			//PRODUK DAN KATEGORI
			case 'add_kategori':
				include "produk/tambah_kategori.php";
				break;					
			case 'edit_kategori':
				include "produk/edit_kategori.php";
				break;					
			case 'delete_kategori':
				include "produk/hapus_kategori.php";
				break;					

			case 'produk':
				include "produk/data_produk.php";
				break;					
			case 'add_produk':
				include "produk/tambah_produk.php";
				break;				
			case 'lihat_produk':
				include "produk/lihat_produk.php";
				break;	
			case 'edit_produk':
				include "produk/edit_produk.php";
				break;
			case 'delete_produk':
				include "produk/hapus_produk.php";
				break;
			case 'up_produk':
				include "produk/up_produk.php";
				break;
			case 'down_produk':
				include "produk/down_produk.php";
				break;
					// PRODUK BEREEEESSSSSS /////


			// PELANGGAN
			case 'pelanggan':
				include "pelanggan/data_pelanggan.php";
				break;					
			case 'konfirmasi_pelanggan':
				include "pelanggan/konfirmasi.php";
				break;				
			case 'lihat_pelanggan':
				include "pelanggan/lihat_pelanggan.php";
				break;					
			case 'edit_pelanggan':
				include "pelanggan/edit_pelanggan.php";
				break;					
			case 'delete_pelanggan':
				include "pelanggan/hapus_pelanggan.php";
				break;					
						

			//TRANSAKSI
			case 'transaksi':
				include "transaksi/transaksi.php";
				break;
			case 'detail_transaksi':
				include "transaksi/detail_transaksi.php";
				break;
			case 'validasi_pembayaran':
				include "transaksi/validasi_pembayaran.php";
				break;
			case 'delete_transaksi':
				include "transaksi/hapus_transaksi.php";
				break;


			//----------- PENGIRIMAN --------------
			case 'pengiriman':
				include "pengiriman/pengiriman.php";
				break;
			case 'kirim':
				include "pengiriman/kirim.php";
				break;
			case 'pesanan_diterima':
				include "pengiriman/pesanan_diterima.php";
				break;
	
			//--------- USERS ------------
			case 'users':
				include "users/data_user.php";
				break;
			case 'tambah_user':
				include "users/tambah_user.php";
				break;
			case 'edit_user':
				include "users/edit_user.php";
				break;
			case 'hapus_user':
				include "users/hapus_user.php";
				break;

			//--------- CHAT --------------
			case 'chat':
				include "pelanggan/chat.php";
				break;
			case 'reward':
				include "reward.php";
				break;
			case 'edit_reward':
				include "edit_reward.php";
				break;	


			case 'logout':
				include "logout.php";
				break;

				case 'info':
				include "info.php";
				break;
			case 'layanan':
				include "info.php";
				break;
			case 'registrasi':
				include "registrasi.php";
				break;
				
			default:
				//echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		}
	}else{
		include "home.php";
	}
?>