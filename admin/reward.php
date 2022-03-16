
    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Selamat Datang, <?=$_SESSION['nama_user']?></h1>
    </div>

    <div class="container">
        <div class="row"><br>
                <div class="biolife-title-box">
                    <h3 class="main-title">DATA REWARD</h3>
                </div>
                <br>
                        <table class="striped">
                            <tbody>
                                <?php
                                
                                $poin = mysqli_query($koneksi, "SELECT * FROM tbl_reward");
                                $data_poin = mysqli_fetch_array($poin);
                                
                                ?>
                                <tr>
                                    <td>Nama Reward</td>
                                    <td><?=$data_poin['nama_reward']?></td>
                                </tr>
                                <tr>
                                    <td>Poin per transaksi</td>
                                    <td><?=$data_poin['poin']?></td>
                                </tr>
                                <tr>
                                    <td>Nilai Poin</td>
                                    <td><?=rupiah($data_poin['harga_poin'])?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="index.php?page=edit_reward&id=<?=$data_poin['id_reward']?>" class="btn btn-warning" ><i class="fa fa-pencil fa-sm text-white-60"></i> Edit Data Reward</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
            </div>
        </div>  