    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Air Minum Isi Ulang</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index.php" class="permal-link">Beranda</a></li>
                <li class="nav-item"><a href="index.php?page=isiulang" class="permal-link">Air Minum Isi Ulang</a></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
				<BR>
                <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="block-item recently-products-cat md-margin-bottom-39">
                        <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":2,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":30}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}' >
                            <?php
                            $produk = mysqli_query($koneksi, "SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori WHERE tbl_produk.id_kategori='2'");
                            while($data_produk = mysqli_fetch_array($produk)) {

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

                                if($data_produk['stok']==0) {
                                    $ket = "<h4 class='product-title'><font color='red'>HABIS</font></h4>";
                                    $link_keranjang = "<a href='#' class='btn add-to-cart-btn' disabled>Masukan Keranjang</a";
                                } else {
                                    $ket = "";
                                    $link_keranjang = "<a href='index.php?page=add_keranjang&id=".$data_produk['kd_produk']."' class='btn add-to-cart-btn' >Masukan Keranjang</a>";
                                }

                            ?>
                            <li class="product-item">
                                <div class="contain-product layout-02">
                                    <div class="product-thumb">
                                        <a href="index.php?page=detail_produk&id=<?=$data_produk['kd_produk']?>" class="link-to-product">
                                            <img src="admin/produk/pict/<?=$data_produk['gambar']?>" alt="dd" width="270" height="270" class="product-thumnail">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <b class="categories"><?=$diskon?></b>
                                        <b><?=$ket?></b>
                                        <h4 class="product-title"><a href="index.php?page=detail_produk&id=<?=$data_produk['kd_produk']?>" class="pr-name"><?=$data_produk['nama_produk']?></a></h4>
                                        <div class="price">
                                            <ins><span class="price-amount"><?=$harga?></span></ins>
                                            <del><span class="price-amount"><?=$harga_coret?></span></del>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    </div>

                </div>

            </div>
        </div>
    </div>