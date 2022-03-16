<?php
ob_start();
?>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barokah Depot</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/sign.png"/>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nice-select.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main-color.css">
</head>
<body class="biolife-body">
    <!-- Preloader -->
    <div id="biof-loading">
        <div class="biof-loading-center">
            <div class="biof-loading-center-absolute">
                <div class="dot dot-one"></div>
                <div class="dot dot-two"></div>
                <div class="dot dot-three"></div>
            </div>
        </div>
    </div>
    <header id="header" class="header-area style-01 layout-03">
        <div class="header-top bg-main hidden-xs">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>barokah_depot@gmail.com</a></li>
                        <li><a href="#">Free Ongkir untuk Desa Bojong</a></li>
                    </ul>
                </div>
                <div class="top-bar right">
                    <ul class="horizontal-menu">
                        <li><a href="index.php?page=login" target="_blank" class="login-link"><i class="biolife-icon icon-login"></i>Masuk/Registrasi</a></li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="header-middle biolife-sticky-object ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                        <a href="index.php" class="biolife-logo"><img src="assets/images/bg-full.png" alt="biolife logo" width="230" height="60"></a>
                    </div>
					<div class="col-lg-9 col-md-8 padding-top-2px">
                   
					<div class="header-search-bar layout-01">
                            <form action="index.php?page=isiulang" class="form-search" name="desktop-search" method="get" >
                                <input type="text"   name="s" class="input-text" value="" placeholder="Search here...">
                                <a href="index.php?page=isiulang" button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                            </form>
                        </div>
						<div class="live-info">
                            <p class="telephone"><a href="index.php"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">0822-1809-6202</b></p>
                            <p class="working-time">Senin-Jum'at: 08:00-19.00; Sabtu-Minggu: 08.00-17.00</p> 
                        </div>
						     
                        
                    </div>
					
                    
                </div>
            </div>
        </div>

        <div class="header-bottom hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                <div class="col-lg-3 col-md-2">
                        <div class="vertical-menu vertical-category-block">
                            <div class="block-title">
                            <span class="menu-icon">
                                    <span class="line-1"></span>
                                    <span class="line-2"></span>
                                    <span class="line-3"></span>
                                </span>
                                <span class="menu-title">Semua Kategori</span>
                                <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            </div>
                            <div class="wrap-menu">
                                <ul class="menu clone-main-menu">
                                    <?php
                                    include "koneksi.php";

                                    $kategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                                    while($data_kategori = mysqli_fetch_array($kategori)) {

                                        if($data_kategori['id_kategori']==2)
                                        {
                                             $tombol = "<a href='index.php?page=isiulang' class='menu-name' >".$data_kategori['nama_kategori']."</a>";
                                        } else {
                                            $tombol = "<a href='index.php?page=peralatan' class='menu-name' >".$data_kategori['nama_kategori']."</a>";
                                        }

                                    ?>
                                        <li class="menu-item menu-item-has-children has-megamenu">
                                            <?=$tombol?>
                                        </li>
                                    <?php

                                    }
                                    ?>
                                </ul>
                            </div>
							
                        </div>
						
                    </div>

                    <div class="col-lg-14 col-md-18">
                        <div class="primary-menu">
                            <ul  class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                                <li class="menu-item"><a href="index.php">&emsp; Beranda</a></li>
                                <li class="menu-item"><a href="index.php?page=isiulang">Isi Ulang</a></li>
                                <li class="menu-item"><a href="index.php?page=peralatan">Perlengkapan Depot</a></li>
								<li class="menu-item"><a href="index.php?page=cara_bayar">Cara Bayar</a></li>
		                        <li class="menu-item"><a href="index.php?page=about_us">Tentang Kami</a></li>
                                <li class="wishlist-block hidden-sm hidden-xs"><a href="index.php?page=add_keranjang" class="link-to">&emsp;&emsp;&emsp;&emsp;&emsp;<span class="icon-qty-combine">
								<i class="icon-comment biolife-icon"></i>
								</span></a></li>
         								<li class="wishlist-block hidden-sm hidden-xs"><a href="index.php?page=add_keranjang" class="link-to">&emsp;<span class="icon-qty-combine">
                                        <i class="icon-car biolife-icon"></i>
                                    </span></a></li>
										<li class="minicart-contain"><a href="index.php?page=add_keranjang" class="link-to">&emsp;<span class="icon-qty-combine">
                                         <i class="icon-cart-mini biolife-icon"></i>
                                    </span></a></li>
                             </ul>
                        </div>                        
                    </div>

                </div>
            </div>
        </div>
    </header>
    
<?php
session_start();

function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

function rupiah($angka)
{
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}

include "konten.php";

?>
<br><br><br><br><br><br><br>

<footer id="footer" class="footer layout-03">
        <div class="footer-content background-footer-03">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-9">
                        <section class="footer-item">
                            <a href="index.php" class="logo footer-logo"><img src="assets/images/bg-full.png" alt="biolife logo" width="135" height="34"></a>
                            <div class="footer-phone-info">
                                <i class="biolife-icon icon-head-phone"></i>
                                <p class="r-info">
                                    <span>Ada Pertanyaan?</span>
                                    <span>0822-1809-6202</span>
                                </p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 md-margin-top-5px sm-margin-top-50px xs-margin-top-40px">
                        <section class="footer-item">
                        <h3 class="section-title">Lokasi</h3>
                            <div class="contact-info-block footer-layout xs-padding-top-10px">
                                <ul class="contact-lines">
                                    <li>
                                        <p class="info-item">
                                            <i class="biolife-icon icon-location"></i>
                                            <b class="desc">Jl.Dukuh, Dusun Kliwon, Desa Bojong, Kec. Cilimus, Kab. Kuningan, Jawa Barat</b>
                                        </p>
                                    </li>
									<br>
                                    <li>
                                        <p class="info-item">
                                            <i class="biolife-icon icon-phone"></i>
                                            <b class="desc">HP: 0822-1809-6202</b>
                                        </p>
                                    </li>
									<br>
                                    <li>
                                        <p class="info-item">
                                            <i class="biolife-icon icon-clock"></i>
                                            <b class="desc">Senin-Jumat  : 08.00 - 19.00</b>
                                            <b class="desc">Sabtu-Minggu : 08.00 - 17.00</b>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            
                        </section>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 md-margin-top-5px sm-margin-top-50px xs-margin-top-40px">
                        <section class="footer-item">
                            <h3 class="section-title">Pembayaran</h3>
                            <ul>
                                <li><a href="index.php?page=cara_bayar" class="payment-link"><img src="assets/images/byr3.jpg" width="51" height="36" alt=""></a></li><br>
                                <li><a href="index.php?page=cara_bayar" class="payment-link"><img src="assets/images/byr1.jpg" width="51" height="36" alt=""></a></li><br>
                                <li><a href="index.php?page=cara_bayar" class="payment-link"><img src="assets/images/byr2.png" width="51" height="36" alt=""></a></li><br>
								<li><a href="index.php?page=cara_bayar" class="payment-link"><img src="assets/images/byr4.png" width="51" height="36" alt=""></a></li>
                            </ul>
                        </section>
                    </div>
                </div>
                <div class="row">
                    
                    
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.nicescroll.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/biolife.framework.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>
<?php

require 'hitcounter.php';

$hit = new HitCounter();
//cek dan simpan
$hit->Hitung();

//tampilkan counter
  echo  '&emsp; Jumlah Pengunjung Website : ' . $hit->tampil();

//tampilkan history jika ada
$h = $hit->waktu();
if (!empty($h)) {
    echo '<br> &emsp; Anda telah mengunjungi halaman ini pada : ' . $h;
}