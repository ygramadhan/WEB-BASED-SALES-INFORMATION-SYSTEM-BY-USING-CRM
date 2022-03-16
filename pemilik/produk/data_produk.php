    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Selamat Datang, <?=$_SESSION['nama_user']?></h1>
    </div>

    <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
           <div class="container">
                <div class="biolife-title-box">
                    <h3 class="main-title">DATA PRODUK</h3>
                </div>
                <br><br>
            <?php

            $grid = $_GET['view'];

            if($grid=='grid'){

                    ?>
                    <a href="index.php?page=produk&view=tabel" class="btn btn-primary" ><i class="fa fa-eye fa-sm text-white-60"></i> Lihat Tabel</a>
                    <a href="index.php?page=add_produk" class="btn btn-primary" ><i class="fa fa-plus fa-sm text-white-60"></i> Tambah Data</a>

                <div class="biolife-tab biolife-tab-contain sm-margin-top-34px">
                    <div class="tab-content">  
                        <div id="tab01_1st" class="tab-contain active">
                            <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>
                                <?php
                                    
                                    $produk1 = mysqli_query($koneksi, "SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori");
                                    var_dump($produk1);

                                    while($data_produk1=mysqli_fetch_array($produk1)){
                                        
                                        if($data_produk1['diskon']==0)
                                        {
                                            $harga = rupiah($data_produk1['harga']);
                                            $harga_coret = "";
                                            $diskon ="";
                                        } else {
                                            $harga_coret = rupiah($data_produk1['harga']);
                                            $hit_diskon = $data_produk1['diskon']*$data_produk1['harga']/100;
                                            $harga = rupiah($data_produk1['harga']-$hit_diskon);
                                            $diskon = "Diskon ".$data_produk1['diskon']." %";
                                        }                                        

                                    ?>
                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="index.php?page=detail_produk&id=<?=$data_produk1['kd_produk']?>" class="link-to-product">
                                                    <img src="produk/pict/<?=$data_produk1['gambar']?>" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories"><?=$data_produk1['nama_kategori']?></b>
                                                <h4 class="product-title"><a href="index.php?page=detail_produk&id=<?=$data_produk1['kd_produk']?>" class="pr-name"><?=$data_produk1['nama_produk']?></a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><?=$harga?></span></ins>
                                                    <del><span class="price-amount"><?=$harga_coret?></span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message"><?=$data_produk1['deskripsi']?></p>
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

                    <?php 
                    } else {
                    ?>
                    <br><br>
                        <table class="striped">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>Kode Produk</td>
                                    <td>Nama Produk</td>
                                    <td>Kategori</td>
                                    <td>Berat (gr)</td>
                                    <td>Harga</td>
                                    <td>Stok</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            $batas = 5;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $jml_produk = mysqli_query($koneksi, "SELECT * FROM tbl_produk");
                            $jumlah_data = mysqli_num_rows($jml_produk);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $produk = mysqli_query($koneksi, "SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori limit $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;

                            while($data_produk = mysqli_fetch_array($produk)){

                                $hit_produk = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE status=1");
                                $hit_status = mysqli_num_rows($hit_produk);

                                    if($data_produk['status']==0) {
                                        $status = "";
                                    } else {
                                        $status = "Produk Teratas";
                                    }
                            ?>
                            <tr>
                                <td><?=$nomor++?></td>
                                <td><?=$data_produk['kd_produk']?></td>
                                <td><?=$data_produk['nama_produk']?></td>
                                <td><?=$data_produk['nama_kategori']?></td>
                                <td><?=$data_produk['berat']?></td>
                                <td><?=rupiah($data_produk['harga'])?></td>
                                <td><?=$data_produk['stok']?></td>
                                <td><?=$status?></td>
                            </tr>
                            <?php
                            }

                            $hit_produk1 = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE status=1");
                            $hit_status1 = mysqli_num_rows($hit_produk1);
                            ?>
                            </tbody>
                        </table>
                        <b>Jumlah Produk yang dinaikan : <?=$hit_status1?></b>
                                                        <!--PAGINATION-->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" <?php if($halaman > 1){ echo "href='?page=produk&view=tabel&halaman=$previous'"; } ?> ><span aria-hidden="true">&laquo;</span> Previous</a>
                                            
                                        </li>
                                        <?php 
                                            for($x=1;$x<=$total_halaman;$x++){
                                                ?> 
                                                <li class="page-item"><a class="page-link" href="?page=produk&view=tabel&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                                <?php
                                            }
                                        ?>	
                                    <li class="page-item">
                                        <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=produk&view=tabel&halaman=$next'"; } ?>>Next <span aria-hidden="true">&raquo;</span></a>                                            
                                    </li>
                                    </ul>
                                </nav>
                        <?php
                        }
                        ?>    
        </div>
    </div>
</div>