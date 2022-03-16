        <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Detail Produk</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index.php" class="permal-link">Beranda</a></li>
                <li class="nav-item"><a href="#" class="permal-link">Detail Produk</a></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain single-product">
        <div class="container">

        <?php
        $id = $_GET['id'];
        $produk = mysqli_query($koneksi, "SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori WHERE kd_produk='$id'");
        $data_produk = mysqli_fetch_array($produk);

        if($data_produk['diskon']==0)
        {
            $harga = rupiah($data_produk['harga']);
            $harga_coret = "";
            $diskon ="";
        } else {
            $harga_coret = rupiah($data_produk['harga']);
            $hit_diskon = $data_produk['diskon']*$data_produk['harga']/100;
            $harga = rupiah($data_produk['harga']-$hit_diskon);
            $diskon = "Diskon ".$data_produk['diskon']." %";
        }

        //cek stok
        if($data_produk['stok']==0) {
            $link_keranjang = "<a href='#' class='btn add-to-cart-btn' disabled>Masukan Keranjang</a";
        } else {
            $link_keranjang = "<a href='index.php?page=add_keranjang&id=".$data_produk['kd_produk']."' class='btn add-to-cart-btn' >Masukan Keranjang</a>";
        }

        ?>

            <!-- Main content -->
            <div id="main-content" class="main-content">
                
                <!-- summary info -->
                <div class="sumary-product single-layout">
                    <div class="media">
                        <ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
                            <li><img src="../admin/produk/pict/<?=$data_produk['gambar']?>" alt="" width="500" height="500"></li>
                        </ul>
                    </div>
                    <div class="product-attribute">
                        <h3 class="title"><?=$data_produk['nama_produk']?></h3>
                        <span class="sku">Kategori : <?=$data_produk['nama_kategori']?></span>
                        <p class="excerpt">Berat : <?=$data_produk['berat']?> gram</p>
                        <p class="excerpt">Stok  : <?=$data_produk['stok']?></p>
                        <p class="excerpt"><?=$data_produk['deskripsi']?></p>
                        <div class="price">
                            <ins><span class="price-amount"><?=$harga?></span></ins>
                            <del><span class="price-amount"><?=$harga_coret?></span></del>
                        </div>
                        <div class="shipping-info">
                            <p class="shipping-day">Proses Pengemasan maksimal 1 hari setelah pembayaran</p>
                            <p class="for-today">Bebas Ongkir untuk desa Bojong</p>
                        </div>
                    </div>
                    <div class="action-form">
                        <div class="buttons">
                            <?=$link_keranjang?>
                        </div>
                        <div class="acepted-payment-methods">
                            <ul class="payment-methods">
                                <li><img src="assets/images/byr3.jpg" alt="" width="51" height="36"></li>
                                <li><img src="assets/images/byr1.jpg" alt="" width="51" height="36"></li>
                                <li><img src="assets/images/byr2.png" alt="" width="51" height="36"></li>
								<li><img src="assets/images/byr4.png" alt="" width="51" height="36"></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

