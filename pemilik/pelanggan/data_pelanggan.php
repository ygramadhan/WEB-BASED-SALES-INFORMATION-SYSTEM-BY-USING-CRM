    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Selamat Datang, <?=$_SESSION['nama_user']?></h1>
    </div>

    <div class="page-contain">
    <div id="main-content" class="main-content">
        <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
            <div class="container">                    
                <div class="biolife-title-box">
                        <h3 class="main-title">DATA PELANGGAN</h3>
                    </div>
                    <br>
                        <table class="striped">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>ID Pelanggan</td>
                                    <td>Nama Lengkap</td>
                                    <td>Jenis Kelamin</td>
                                    <td width="30%">Alamat</td>
                                    <td>Telepon</td>
                                    <td>Status</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            $batas = 5;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $jml_pelanggan = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan");
                            $jumlah_data = mysqli_num_rows($jml_pelanggan);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $pelanggan = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan limit $halaman_awal, $batas");
                            $hit_pelanggan = mysqli_num_rows($pelanggan);

                            $nomor = $halaman_awal+1;

                            if($hit_pelanggan==0){
                                echo "<tr><td colspan='8'><b>Belum ada data pelanggan</b></td></tr>";
                            } else {

                            while($data_pelanggan=mysqli_fetch_array($pelanggan)){

                                if($data_pelanggan['jk']=="L"){
                                    $jk = "Laki-laki";
                                } else {
                                    $jk = "Perempuan";
                                }

                                if($data_pelanggan['status_pelanggan']==0){
                                    $status = "Menunggu Konfirmasi";
                                } else {
                                    $status= "Aktif";
                                }
                            ?>
                            <tr>
                                <td><?=$nomor++?></td>
                                <td><?=$data_pelanggan['id_pelanggan']?></td>
                                <td><?=$data_pelanggan['nama_pelanggan']?></td>
                                <td><?=$jk?></td>
                                <td><?=$data_pelanggan['alamat']?></td>
                                <td><?=$data_pelanggan['telp']?></td>
                                <td><?=$status?></td>
                                <td>
                                <a href="index.php?page=lihat_pelanggan&id=<?=$data_pelanggan['id_pelanggan']?>" class="btn btn-info" ><i class="fa fa-eye fa-sm text-white-60"></i></a>
                            </tbody>
                            <?php
                            }
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