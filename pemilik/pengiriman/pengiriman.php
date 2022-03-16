    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Selamat Datang, <?=$_SESSION['nama_user']?></h1>
    </div>

    <div class="page-contain">
    <div id="main-content" class="main-content">
        <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
            <div class="container">                    
                <div class="biolife-title-box">
                        <h3 class="main-title">DATA PENGIRIMAN</h3>
                    </div>
                    <br>
                        <table class="striped">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>ID Order</td>
                                    <td>Nama Pelanggan</td>
                                    <td>Tanggal Pengiriman</td>
                                    <td>Kurir</td>
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

                            $jml_order = mysqli_query($koneksi, "SELECT * FROM tbl_pengiriman");
                            $jumlah_data = mysqli_num_rows($jml_order);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $order = mysqli_query($koneksi, "SELECT * FROM tbl_pengiriman JOIN tbl_transaksi ON tbl_pengiriman.id_order=tbl_transaksi.id_order limit $halaman_awal, $batas");

                            $nomor = $halaman_awal+1;
                            while($data_order=mysqli_fetch_array($order)){

                                if($data_order['status']==1) {
                                    $status = "Menunggu Pembayaran";
                                } elseif($data_order['status']==2) {
                                    $status ="Menunggu Validasi Pembayaran Admin";
                                } elseif($data_order['status']==3) {
                                    $status ="<a href='index.php?page=kirim&id=".$data_order['id_order']."' class='btn btn-primary'>Kirim</a>";
                                } elseif($data_order['status']==4) {
                                    $status ="<a href='index.php?page=pesanan_diterima&id=".$data_order['id_order']."' class='btn btn-primary'>Pesanan Diterima</a>";
                                } else {
                                    $status = "Sudah diterima";
                                }

                                //data pelanggan
                                $pelanggan = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan = tbl_pelanggan.id_pelanggan WHERE id_order='$data_order[id_order]'");
                                $data_pelanggan = mysqli_fetch_array($pelanggan);

                            ?>
                            <tr>
                                <td><?=$nomor++?></td>
                                <td><a href="index.php?page=detail_transaksi&id=<?=$data_order['id_order']?>"><?=$data_order['id_order']?></a></td>
                                <td><?=$data_pelanggan['nama_pelanggan']?></td>
                                <td><?=tanggal_indo($data_order['tgl_pemesanan'])?></td>
                                <td><?=$data_order['kurir']?></td>
                                <td><?=$status?></td>
                            </tbody>
                            <?php
                            }
                            ?>
                        </table>
                                                        <!--PAGINATION-->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" <?php if($halaman > 1){ echo "href='?page=pelanggankonsumen&halaman=$previous'"; } ?> ><span aria-hidden="true">&laquo;</span> Previous</a>                                                    
                                            
                                        </li>
                                        <?php 
                                            for($x=1;$x<=$total_halaman;$x++){
                                                ?> 
                                                <li class="page-item"><a class="page-link" href="?page=pelanggan&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                                <?php
                                            }
                                        ?>	
                                    <li class="page-item">
                                        <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=konsumen&halaman=$next'"; } ?>>Next <span aria-hidden="true">&raquo;</span></a>                                            
                                    </li>
                                    </ul>
                                </nav>

                </div>      
        </div>
    </div>
</div>