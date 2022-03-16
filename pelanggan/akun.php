    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Selamat Datang, <?=$_SESSION['nama_user']?></h1>
    </div>

    <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
           <div class="container">
                <div class="biolife-title-box">
                    <h3 class="main-title">AKUN SAYA</h3>
                </div>
                <br><br>
                        <table class="striped">
                            <tbody>
                            <?php

                            $pelanggan = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$_SESSION[id_pelanggan]'");

                            while($data_pelanggan = mysqli_fetch_array($pelanggan)){

                                if($data_pelanggan['jk']=='L')
                                {
                                    $jk = "Laki-laki";
                                } else {
                                    $jk = "Perempuan";
                                }


                            ?>
                            <tr>
                                <td>ID Pelanggan</td>
                                <td><?=$data_pelanggan['id_pelanggan']?></td>
                            </tr>
                            <tr>
                                <td>Nama Pelanggan</td>
                                <td><?=$data_pelanggan['nama_pelanggan']?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td><?=$jk?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td><?=tanggal_indo($data_pelanggan['tgl_lahir'])?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?=$data_pelanggan['alamat']?></td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td><?=$data_pelanggan['telp']?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?=$data_pelanggan['email']?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><?=$data_pelanggan['username']?></td>
                            </tr>
                            <tr>
                                <td>Poin</td>
                                <td><?=$data_pelanggan['poin']?></td>
                            </tr>



                            <?php
                            }

                            ?>
                            </tbody>
                        </table>
        </div>
    </div>
</div>