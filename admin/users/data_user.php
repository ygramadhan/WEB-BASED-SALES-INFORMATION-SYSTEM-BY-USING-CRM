    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Selamat Datang, <?=$_SESSION['nama_user']?></h1>
    </div>

    <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
           <div class="container">
                <div class="biolife-title-box">
                    <h3 class="main-title">DATA USER</h3>
                </div>
                <br><br>
                    <a href="index.php?page=tambah_user" class="btn btn-primary" ><i class="fa fa-plus fa-sm text-white-60"></i> Tambah User</a>
                    <br><br>
                        <table class="striped">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>ID User</td>
                                    <td>Nama User</td>
                                    <td>Username</td>
                                    <td>Level</td>
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

                            $jml_produk = mysqli_query($koneksi, "SELECT * FROM tbl_user");
                            $jumlah_data = mysqli_num_rows($jml_produk);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $produk = mysqli_query($koneksi, "SELECT * FROM tbl_user limit $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;

                            while($data_produk = mysqli_fetch_array($produk)){

                            ?>
                            <tr>
                                <td><?=$nomor++?></td>
                                <td><?=$data_produk['id_user']?></td>
                                <td><?=$data_produk['nama_user']?></td>
                                <td><?=$data_produk['username']?></td>
                                <td><?=$data_produk['level']?></td>
                                <td>
                                <a href="index.php?page=edit_user&id=<?=$data_produk['id_user']?>" class="btn btn-warning" ><i class="fa fa-pencil fa-sm text-white-60"></i></a>
                                <a href="index.php?page=hapus_user&id=<?=$data_produk['id_user']?>" class="btn btn-danger" ><i class="fa fa-trash fa-sm text-white-60"></i></a></td>
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
        </div>
    </div>
</div>