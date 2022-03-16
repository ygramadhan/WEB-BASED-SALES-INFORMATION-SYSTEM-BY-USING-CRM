<div class="page-contain login-page">

<!-- Main content -->
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Go to Register form-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="register-in-container">
                    <div class="intro">
                        <h4 class="box-title"><center>Validasi Pembayaran</h4><br>                       

                        <?php

                        $id = $_GET['id'];

                        $order = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE id_order='$id'");
                        $data_order = mysqli_fetch_array($order);

                        ?>

                        <div class="signin-container">
                            <form action="" name="frm-login" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="fid-name" name="id_order" class="txt-input" value="<?=$data_order['id_order']?>">

                                <p class="form-row">
                                    <label for="fid-name">Bukti Pembayaran : <span class="requite">*</span></label>
                                    <img src="../pelanggan/bukti/<?=$data_order['bukti_byr']?>">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Metode Pembayaran : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="gambar" class="txt-input" value="<?=$data_order['jenis_byr']?>">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Tanggal Pembayaran : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="gambar" class="txt-input" value="<?=tanggal_indo($data_order['tgl_byr'])?>">
                                </p>
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-primary" type="submit" name="simpan">Validasi</button>
                                    
                                </p>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

</div>

<?php

if(isset($_POST['simpan'])) {

    $id_order = $_POST['id_order'];

    $query_add = mysqli_query($koneksi, "UPDATE tbl_transaksi SET status=3 WHERE id_order='$id_order'");

        if($query_add){
            ?>
            <script>
                alert ('Pembayaran berhasil divalidasi');
                window.location.href = "index.php?page=pengiriman";
            </script>
        <?php
        } else {
        ?>
            <script>
            alert ('Pembayaran gagal divalidasi');
            window.location.href = "index.php?page=transaksi";
		</script>	
        <?php
        }
}

?>