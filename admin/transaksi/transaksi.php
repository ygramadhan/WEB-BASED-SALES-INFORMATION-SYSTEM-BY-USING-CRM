    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Selamat Datang, <?=$_SESSION['nama_user']?></h1>
    </div>

    <div class="page-contain">
    <div id="main-content" class="main-content">
        <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
            <div class="container">                    
                
                    <br>
                    <form class="d-flex search" action="" method="POST" >
 									<br>
									<div class="mb-3">
                                        <label for="nama" class="col-form-label">Filter Tanggal :</label><br>
                                        <input type="date" name="tgl_awal" value="<?=$_GET['tgl_awal']?>">
                                        sd/
                                        <input type="date" name="tgl_akhir" value="<?=$_GET['tgl_akhir']?>" ><br><br>
                                        <button class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" name="filter" type="submit">Tampilkan</button>
                                        <a href="index.php?page=transaksi" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Reset Filter</a>
                                    </div>
                                    </form>
                            <?php
                                
                                $batas = 15;
                                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

                                $previous = $halaman - 1;
                                $next = $halaman + 1;

                                $jml_order = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi");
                                $jumlah_data = mysqli_num_rows($jml_order);
                                $total_halaman = ceil($jumlah_data / $batas);

                            if(isset($_POST['filter'])){

                                $tgl_awal = $_POST['tgl_awal'];
                                $tgl_akhir = $_POST['tgl_akhir'];

                                if(empty($tgl_awal) or empty($tgl_akhir)) {

                                    $order = mysqli_query($koneksi,"SELECT * FROM  tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan=tbl_pelanggan.id_pelanggan limit $halaman_awal, $batas");
                                    $url_cetak = "transaksi/laporan_transaksi.php";
                                    $ket = "";
                                } else {
                                    $order = mysqli_query($koneksi,"SELECT * FROM  tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan=tbl_pelanggan.id_pelanggan WHERE (tgl_pemesanan BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."') limit $halaman_awal, $batas");
                                    $url_cetak = "transaksi/laporan_transaksi.php?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir;
                                    $ket = "<center><b><h3>DATA TRANSAKSI</h3></b><h6><b> PERIODE ".tanggal_indo($tgl_awal)." sd/ ".tanggal_indo($tgl_akhir)." :</b></h6>";
                                }
                            ?>
                                <div class="biolife-title-box">
                                    <h4 class="main-title"><?=$ket?></h4>
                                </div>

                            <a href="<?=$url_cetak?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank" ><i class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan</a><br><br>

                            <table class="striped">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>ID Order</td>
                                        <td>Nama Pelanggan</td>
                                        <td>Tanggal Order</td>
                                        <td>Pembayaran</td>
                                        <td>Jumlah Bayar</td>
                                        <td>Status</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php

                                $nomor = $halaman_awal+1;
                                while($data_order=mysqli_fetch_array($order)){

                                    if($data_order['status']==1) {
                                        $status = "Menunggu Pembayaran";
                                    } elseif($data_order['status']==2) {
                                        $status ="<a href='index.php?page=validasi_pembayaran&id=".$data_order['id_order']."' class='btn btn-success'>Validasi</a>";
                                    } elseif($data_order['status']==3) {
                                        $status ="Sedang Dikemas";
                                    } elseif($data_order['status']==4) {
                                        $status = "Sedang dikirim";
                                    } else {
                                        $status = "Sudah diterima";
                                    }

                                ?>
                                        <tr>
                                            <td><?=$nomor++?></td>
                                            <td><?=$data_order['id_order']?></td>
                                            <td><?=$data_order['nama_pelanggan']?></td>
                                            <td><?=$data_order['tgl_pemesanan']?></td>
                                            <td><?=$data_order['jenis_byr']?></td>
                                            <td><?=$data_order['jml_byr']?></td>
                                            <td><?=$status?></td>
                                            <td>
                                            <a href="index.php?page=detail_transaksi&id=<?=$data_order['id_order']?>" class="btn btn-info" ><i class="fa fa-eye fa-sm text-white-60"></i></a>
                                            <a href="index.php?page=delete_transaksi&id=<?=$data_order['id_order']?>" class="btn btn-danger" ><i class="fa fa-trash fa-sm text-white-60"></i></a></td>
                                        </tbody>
                                        <?php
                                        }
                                        ?>`
                        </table>
                                                        <!--PAGINATION-->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" <?php if($halaman > 1){ echo "href='?page=transaksi&halaman=$previous'"; } ?> ><span aria-hidden="true">&laquo;</span> Previous</a>                                                    
                                            
                                        </li>
                                        <?php 
                                            for($x=1;$x<=$total_halaman;$x++){
                                                ?> 
                                                <li class="page-item"><a class="page-link" href="?page=transaksi&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                                <?php
                                            }
                                        ?>	
                                    <li class="page-item">
                                        <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=transaksi&halaman=$next'"; } ?>>Next <span aria-hidden="true">&raquo;</span></a>                                            
                                    </li>
                                    </ul>
                                </nav>


                            <?php
                            } else {
                            ?>
                                <div class="biolife-title-box">
                                    <h4 class="main-title">DATA TRANSAKSI</h4><br><br>
                                </div>

                    <a href="transaksi/laporan_transaksi_all.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank" ><i class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan</a><br><br>

                        <table class="striped">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>ID Order</td>
                                    <td>Nama Pelanggan</td>
                                    <td>Tanggal Order</td>
                                    <td>Pembayaran</td>
                                    <td>Jumlah Bayar</td>
                                    <td>Status</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $order = mysqli_query($koneksi,"SELECT * FROM  tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan=tbl_pelanggan.id_pelanggan ORDER BY tgl_pemesanan DESC limit $halaman_awal, $batas");
    
                                    $nomor = $halaman_awal+1;
                                    while($data_order=mysqli_fetch_array($order)){
    
                                        if($data_order['status']==1) {
                                            $status = "Menunggu Pembayaran";
                                        } elseif($data_order['status']==2) {
                                            $status ="<a href='index.php?page=validasi_pembayaran&id=".$data_order['id_order']."' class='btn btn-success'>Validasi</a>";
                                        } elseif($data_order['status']==3) {
                                            $status ="Sedang Dikemas";
                                        } elseif($data_order['status']==4) {
                                            $status = "Sedang dikirim";
                                        } elseif($data_order['status']==5) {
                                            $status = "Menunggu Konfirmasi Pelanggan";
                                        } else {
                                            $status = "Pesanan Diterima";
                                        }
                                ?>
                            <tr>
                                <td><?=$nomor++?></td>
                                <td><?=$data_order['id_order']?></td>
                                <td><?=$data_order['nama_pelanggan']?></td>
                                <td><?=tanggal_indo($data_order['tgl_pemesanan'])?></td>
                                <td><?=$data_order['jenis_byr']?></td>
                                <td><?=rupiah($data_order['jml_byr'])?></td>
                                <td><?=$status?></td>
                                <td>
                                <a href="index.php?page=detail_transaksi&id=<?=$data_order['id_order']?>" class="btn btn-info" ><i class="fa fa-eye fa-sm text-white-60"></i></a>
                                <a href="index.php?page=delete_transaksi&id=<?=$data_order['id_order']?>" class="btn btn-danger" ><i class="fa fa-trash fa-sm text-white-60"></i></a></td>
                            </tbody>
                            <?php
                            }
                            ?>
                        </table>
                                                        <!--PAGINATION-->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" <?php if($halaman > 1){ echo "href='?page=transaksi&halaman=$previous'"; } ?> ><span aria-hidden="true">&laquo;</span> Previous</a>                                                    
                                            
                                        </li>
                                        <?php 
                                            for($x=1;$x<=$total_halaman;$x++){
                                                ?> 
                                                <li class="page-item"><a class="page-link" href="?page=transaksi&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                                <?php
                                            }
                                        ?>	
                                    <li class="page-item">
                                        <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=transaksi&halaman=$next'"; } ?>>Next <span aria-hidden="true">&raquo;</span></a>                                            
                                    </li>
                                    </ul>
                                </nav>
                            <?php
                            }
                        ?>

                </div>      
        </div>
    </div>
</div>