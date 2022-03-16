    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Selamat Datang, <?=$_SESSION['nama_user']?></h1>
    </div>

    <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
           <div class="container">
                <div class="biolife-title-box">
                    <h3 class="main-title">EDIT DATA REWARD</h3>
                </div>
                <br>
                    <form action="" method="post">
                        <table class="striped">
                            <tbody>
                                <?php
                                
                                $id = $_GET['id'];
                                $poin = mysqli_query($koneksi, "SELECT * FROM tbl_reward WHERE id_reward='$id'");
                                $data_poin = mysqli_fetch_array($poin);
                                
                                ?>
                                <tr>
                                    <td>ID Reward</td>
                                    <td><input type="text" name="id_reward" value="<?=$data_poin['id_reward']?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Nama Reward</td>
                                    <td><input type="text" name="nama_reward" value="<?=$data_poin['nama_reward']?>"></td>
                                </tr>
                                <tr>
                                    <td>Poin per transaksi</td>
                                    <td><input type="text" name="poin" value="<?=$data_poin['poin']?>"></td>
                                </tr>
                                <tr>
                                    <td>Nilai Poin</td>
                                    <td>
                                        <input type="text" name="harga_poin" value="<?=$data_poin['harga_poin']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="0">
                                        <button type="submit" name="edit" class="btn btn-success"><i class="fa fa-pencil fa-sm text-white-60"></i> Edit</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
        </div>
    </div>

<?php

if(isset($_POST['edit'])) {

    $id_reward = $_POST['id_reward'];
    $nama_reward = $_POST['nama_reward'];
    $poin = $_POST['poin'];
    $harga_poin = $_POST['harga_poin'];

    $ubah = mysqli_query($koneksi, "UPDATE tbl_reward SET nama_reward='$nama_reward', poin='$poin', harga_poin='$harga_poin' WHERE id_reward='$id_reward'");

    if($ubah) {
        ?>
        <script>
            alert('Data Reward Berhasil diubah');
            window.location.href="index.php?page=reward";
        </script>
    <?php
    }

}
?>