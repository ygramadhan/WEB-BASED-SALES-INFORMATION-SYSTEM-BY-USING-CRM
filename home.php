<div class="page-contain"
    <div id="main-content" class="main-content">

            <!--Block 01: Main slide-->
            <div class="main-slide block-slider">
                <ul class="biolife-carousel nav-none-on-mobile" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}' >
                    <li>
                        <div class="slide-contain slider-opt03__layout01">
                            <div class="media">
                                <div class="child-elememt">
                                    <img src="assets/images/slide-01.png" width="700" height="700" alt="">
                                </div>
                            </div>
                            <div class="text-content">
                                <i class="first-line">Air Minum Isi Ulang</i>
                                <h3 class="second-line">Dengan Kualitas Terbaik</h3>
                                <p class="third-line">Teruji Klinis, Aman dan Higenis</p>
                                <p class="buttons">
                                <a href="index.php?page=isiulang" class="btn btn-bold">Lihat Produk</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slide-contain slider-opt03__layout01">
                            <div class="media">
                                <div class="child-elememt"><a href="index.php?page=peralatan" class="link-to"><img src="assets/images/slide-02.png" width="604" height="580" alt=""></a></div>
                            </div>
                            <div class="text-content">
                                <i class="first-line">Perlengkapan Depot</i>
                                <h3 class="second-line">Kualitas Terjamin</h3>
                                <p class="third-line">Menyediakan perlengkapan depot<br> dengan kualitas terbaik</p>
                                <p class="buttons">
                                    <a href="index.php?page=peralatan" class="btn btn-bold">Lihat Produk</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                         <div class="slide-contain slider-opt03__layout01">
                            <div class="media">
                                <div class="child-elememt"><a href="#" class="link-to"><img src="assets/images/slide-03.png" width="500" height="500" alt=""></a></div>
                            </div>
                            <div class="text-content">
                                <i class="first-line">Dapatkan</i>
                                <h3 class="second-line">Diskon 10%, Promo Poin, Hingga Bonus Menarik</h3>
                                <p class="third-line">Syarat dan Ketentuan<br>berlaku</p>
                                <p class="buttons">
                                    <a href="#produk" class="btn btn-bold">Lihat Produk</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <!--Block 02: Banner-->
            <div class="special-slide">
                <div class="container">
                    <ul class="biolife-carousel dots_ring_style" data-slick='{"arrows": false, "dots": true, "slidesMargin": 30, "slidesToShow": 1, "infinite": true, "speed": 800, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 1}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":20, "dots": false}},{"breakpoint":480, "settings":{ "slidesToShow": 1}}]}' >
                        <?php
                                    
                        $produk_terpilih = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE status=1");

                        while($data_produk_terpilih = mysqli_fetch_array($produk_terpilih)) {

                            if($data_produk_terpilih['diskon']==0)
                            {
                                $harga = rupiah($data_produk_terpilih['harga']);
                                $harga_coret = "";
                                $diskon ="";
                            } else {
                                $harga_coret = rupiah($data_produk_terpilih['harga']);
                                $hit_diskon = $data_produk_terpilih['diskon']*$data_produk_terpilih['harga']/100;
                                $harga = rupiah($data_produk_terpilih['harga']-$hit_diskon);
                                $diskon = "Diskon ".$data_produk_terpilih['diskon']." %";
                            }

                            if($data_produk_terpilih['stok']==0) {
                                $ket = "<b class='first-line'><font color='red'>HABIS</font></b>";
                                $link_keranjang = "<a href='#' class='btn add-to-cart-btn' disabled>Masukan Keranjang</a";
                            } else {
                                $ket = "";
                                $link_keranjang = "<a href='index.php?page=add_keranjang&id=".$data_produk_terpilih['kd_produk']."' class='btn add-to-cart-btn' >Masukan Keranjang</a>";
                            }

                        ?>
                        <li>
                            <div class="slide-contain biolife-banner__special">
                                <div class="banner-contain">
                                    <div class="media">
                                        <a href="index.php?page=detail_produk&id=<?=$data_produk_terpilih['kd_produk']?>" class="bn-link">
                                            <figure><img src="admin/produk/pict/<?=$data_produk_terpilih['gambar']?>" width="500" height="500" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="text-content">
                                        <?=$ket?>
                                        <b class="first-line"><?=$data_produk_terpilih['nama_produk']?></b>
                                        <span class="second-line"><?=$data_produk_terpilih['deskripsi']?></span>
                                        <div class="product-detail">
                                            <div class="price price-contain">
                                            <h4 class="product-name"><?=$diskon?></h4><br>
                                                <ins><span class="price-amount"><?=$harga?></span></ins>
                                                <del><span class="price-amount"><?=$harga_coret?></span></del>
                                            </div>
                                            <div class="buttons">
                                                <?=$link_keranjang?>
                                            </div>
                                        </div>
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

            <!--Block 03: Product Tab-->
            <div class="product-tab z-index-20 sm-margin-top-19px xs-margin-top-30px" id="produk">
                <div class="container">
                    <div class="biolife-title-box">
                        <h3 class="main-title">Produk</h3>
                    </div>
                        <div class="biolife-tab biolife-tab-contain sm-margin-top-34px">
                            <div class="tab-content">                            
                                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>
                                    <?php
                                    $produk = mysqli_query($koneksi, "SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori");           
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
                                            <div class="contain-product layout-default">
                                                <div class="product-thumb">
                                                    <a href="index.php?page=detail_produk&id=<?=$data_produk['kd_produk']?>" class="link-to-product">
                                                        <img src="admin/produk/pict/<?=$data_produk['gambar']?>" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                    </a>
                                                    <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                                </div>
                                                <div class="info">
                                                    <?=$ket?>
                                                    <b class="categories"><?=$data_produk['nama_kategori']?></b>
                                                    <h4 class="product-title"><a href="index.php?page=detail_produk&id=<?=$data_produk['kd_produk']?>" class="pr-name"><?=$data_produk['nama_produk']?></a></h4>
                                                    <div class="price ">
                                                        <ins><span class="price-amount"><?=$harga?></span></ins>
                                                        <del><span class="price-amount"><?=$harga_coret?></span></del>
                                                    </div>
                                                    <div class="slide-down-box">
                                                        <p class="message"><?=$data_produk['deskripsi']?></p>
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