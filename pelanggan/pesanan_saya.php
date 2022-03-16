    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Selamat Datang, <?=$_SESSION['nama_user']?></h1>
    </div>

    <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
           <div class="container">
                <div class="biolife-title-box">
                    <h3 class="main-title">PESANAN SAYA</h3>
                </div>
                <br><br>
                        <table class="striped">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>ID Order</td>
                                    <td>Tanggal Order</td>
                                    <td>Total Bayar</td>
                                    <td>Status</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            $batas = 10;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $jml_produk = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
                            $jumlah_data = mysqli_num_rows($jml_produk);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $order = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE id_pelanggan='$_SESSION[id_pelanggan]' ORDER BY id_order DESC limit $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;

                            while($data_order = mysqli_fetch_array($order)){

                                if($data_order['status']==1){
                                    $status = "<a href='index.php?page=pembayaran&id=".$data_order['id_order']."' class='btn btn-success'><i class='fa fa-dollar fa-sm text-white-60'></i>  Bayar</a>";
                                }elseif($data_order['status']==2){
                                    $status= "Menunggu Konfirmasi Admin";
                                } elseif($data_order['status']==3) {
                                    $status= "Sedang dikemas";
                                } elseif($data_order['status']==4) {
                                    $status= "Sedang dikirim";
                                } elseif($data_order['status']==5) {
                                    $status = "<a href='index.php?page=konfirmasi_pesanan&id=".$data_order['id_order']."' class='btn btn-success'><i class='fa fa-envelope fa-sm text-white-60'></i>  Konfirmasi Pesanan</a>";
                                } else {
                                    $status = "Pesanan Sudah Diterima";
                                }

                            ?>
                            <tr>
                                <td><?=$nomor++?></td>
                                <td><?=$data_order['id_order']?></td>
                                <td><?=tanggal_indo($data_order['tgl_pemesanan'])?></td>
                                <td><?=rupiah($data_order['jml_byr'])?></td>
                                <td><?=$status?></td>
                                <td><a href="index.php?page=detail_order&id=<?=$data_order['id_order']?>" class="btn btn-primary" ><i class="fa fa-eye fa-sm text-white-60"></i>  Detail Order</a></td>
                            </tr>
                            <?php
                            }

                            ?>
                            </tbody>
                        </table>
                                                        <!--PAGINATION-->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" <?php if($halaman > 1){ echo "href='?page=pesanan_saya&halaman=$previous'"; } ?> ><span aria-hidden="true">&laquo;</span> Previous</a>
                                            
                                        </li>
                                        <?php 
                                            for($x=1;$x<=$total_halaman;$x++){
                                                ?> 
                                                <li class="page-item"><a class="page-link" href="?page=pesanan_saya&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                                <?php
                                            }
                                        ?>	
                                    <li class="page-item">
                                        <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=pesanan_saya&halaman=$next'"; } ?>>Next <span aria-hidden="true">&raquo;</span></a>                                            
                                    </li>
                                    </ul>
                                </nav>
        </div>
    </div>
</div>