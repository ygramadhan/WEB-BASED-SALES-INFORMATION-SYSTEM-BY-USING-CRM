<div class="page-contain login-page">

<!-- Main content -->
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Go to Register form-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="register-in-container">
                    <div class="intro">
                        <h4 class="box-title">Detail Produk</h4>
                        <?php

                        $id=$_GET['id'];

                        $produk = mysqli_query($koneksi,"SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori WHERE tbl_produk.kd_produk='$id'");                        
                        $data_produk = mysqli_fetch_array($produk);

                        ?>
                        
                       <div class="signin-container">
                            <form action="" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="fid-name">Kode Produk :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="id_kategori" class="txt-input" value="<?=$data_produk['kd_produk']?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Nama Produk :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_kategori" class="txt-input" value="<?=$data_produk['nama_produk']?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Kategori :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_kategori" class="txt-input" value="<?=$data_produk['nama_kategori']?>" readonly>
                                </p>                                
                                <p class="form-row">
                                    <label for="fid-name">Berat :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_kategori" class="txt-input" value="<?=$data_produk['berat']?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Harga :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_kategori" class="txt-input" value="<?=rupiah($data_produk['harga'])?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Stok :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_kategori" class="txt-input" value="<?=$data_produk['stok']?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Deskripsi :<span class="requite">*</span></label>
                                    <textarea cols="200" rows="5" id="fid-name" name="deskripsi" class="txt-input" readonly><?=$data_produk['deskripsi']?></textarea>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Gambar : <span class="requite">*</span></label>
                                    <img src="produk/pict/<?=$data_produk['gambar']?>" alt="">
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