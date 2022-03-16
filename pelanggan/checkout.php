<!--Hero Section-->
<div class="hero-section hero-background">
        <h1 class="page-title">Pesanan Saya</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Pesanan Saya</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain shopping-cart">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">


                <!--Cart Table-->
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Pesanan Saya</h3>
                            <form class="shopping-cart-form" action="" method="post">
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Kode Pemesanan</th>
                                        <th class="product-price">Produk</th>
                                        <th class="product-quantity">Pcs</th>
                                        <th class="product-subtotal">Harga</th>
                                        <th class="product-subtotal">Diskon</th>
                                        <th class="product-subtotal">Total Bayar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $keranjang = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang JOIN tbl_produk ON tbl_keranjang.kd_produk = tbl_produk.kd_produk WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
                                    $cek_keranjang = mysqli_num_rows($keranjang);

                                    $total=0;
                                    if($cek_keranjang==0) {
                                        echo "<tr><td colspan='4'>Keranjang masih kosong</td></tr>";
                                    } else {
                                    while($data_keranjang = mysqli_fetch_array($keranjang)) {
                                    
                                        //$total = $total+$data_keranjang[''];
                                        if($data_keranjang['diskon']==0)
                                        {
                                            $harga = rupiah($data_keranjang['harga']);
                                            $harga_coret = "";
                                            $diskon ="";
                                        } else {
                                            $harga_coret = rupiah($data_keranjang['harga']);
                                            $hit_diskon = $data_keranjang['diskon']*$data_keranjang['harga']/100;
                                            $harga = rupiah($data_keranjang['harga']-$hit_diskon);
                                            $diskon = "Diskon ".$data_keranjang['diskon']." %";
                                        }
                                    ?>
                                    <tr class="cart_item">
                                        <td class="product-thumbnail" data-title="Product Name">
                                            <a class="prd-thumb" href="#">
                                                <figure><img width="113" height="113" src="../admin/produk/pict/<?=$data_keranjang['gambar']?>" alt="shipping cart"></figure>
                                            </a>
                                            <a class="prd-name" href="#" onclick="fungsi_total()"><?=$data_keranjang['nama_produk']?></a>
                                            <div class="action">
                                                <a href="index.php?page=hapus_keranjang&id=<?=$data_keranjang['kd_keranjang']?>" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><?=$harga?><input type="hidden" id="harga" value="<?=$data_keranjang['harga']?>"></ins>
                                                <del><span class="price-amount"><?=$harga_coret?></span></del>
                                            </div>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity-box type1">
                                                <div class="qty-input">
                                                    <input type="number" id="qty" name="qty1" value="1" data-max_value="20" data-min_value="1" data-step="1" onchange="fungsi_total()">
                                                    <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                                                    <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount" id="subtotal"></span></ins>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }
                                    ?>
                                    <tr class="cart_item wrap-buttons">
                                        <td class="wrap-btn-control" colspan="4">
                                            <a class="btn back-to-shop" href="index.php?page=home">Back to Shop</a>
                                            <a href="index.php?page=hapus_keranjang&id=all" class="btn btn-clear" type="reset">clear all</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="shpcart-subtotal-block">
                                <div class="subtotal-line">
                                    <b class="stt-name">Subtotal <span class="sub">(<?=$cek_keranjang?> items)</span></b>
                                    <span class="stt-price">£170.00</span>
                                </div>
                                <div class="subtotal-line">
                                    <b class="stt-name">Shipping</b>
                                    <span class="stt-price">£0.00</span>
                                </div>
                                <div class="btn-checkout">
                                    <a href="index.php?page=checkout" class="btn checkout">Check out</a>
                                </div>
                                <p class="pickup-info"><b>Pengantaran Isi Air Ulang Gratis</b> se-wilayah desa Bojong</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
		function fungsi_total() {
		var qty = parseInt(document.getElementById('qty').value);
		var harga = parseInt(document.getElementById('harga').value);

		var jumlah_harga = qty * harga;

		document.getElementById("subtotal").innerHTML = "Rp." + jumlah_harga;
        //alert('Good' + jumlah_harga);
		}
	</script>