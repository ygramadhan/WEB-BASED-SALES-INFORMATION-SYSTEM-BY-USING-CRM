<div class="page-contain login-page">

<!-- Main content -->
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Go to Register form-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="register-in-container">
                    <div class="intro">
                        <h4 class="box-title"><center>Detail Pelanggan</h4>
                        <?php

                        $id=$_GET['id'];

                        $pelanggan = mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$id'");                        
                        $data_pelanggan = mysqli_fetch_array($pelanggan);

                        if($data_pelanggan['jk']=="L"){
                            $jk = "Laki-laki";
                        } else {
                            $jk = "Perempuan";
                        }

                        if($data_pelanggan['status_pelanggan']==0){
                            $status = "Menunggu Konfirmasi Admin";
                        } else {
                            $status= "Aktif";
                        }
                        ?>
                        
                       <div class="signin-container">
                            <form action="" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="fid-name">ID Pelanggan :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="id_pelanggan" class="txt-input" value="<?=$data_pelanggan['id_pelanggan']?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Nama Lengkap :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_kategori" class="txt-input" value="<?=$data_pelanggan['nama_pelanggan']?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Jenis Kelamin : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_kategori" class="txt-input" value="<?=$jk?>" readonly>
                                </p>                                
                                <p class="form-row">
                                    <label for="fid-name">Tanggal Lahir :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_kategori" class="txt-input" value="<?=tanggal_indo($data_pelanggan['tgl_lahir'])?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Alamat :<span class="requite">*</span></label>
                                    <textarea cols="200" rows="5" id="fid-name" name="nama_kategori" class="txt-input" readonly ><?=$data_pelanggan['alamat']?></textarea>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Telepon :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_kategori" class="txt-input" value="<?=$data_pelanggan['telp']?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Email :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_kategori" class="txt-input" value="<?=$data_pelanggan['email']?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Username :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_kategori" class="txt-input" value="<?=$data_pelanggan['username']?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Password :<span class="requite">*</span></label>
                                    <input type="password" id="fid-name" name="nama_kategori" class="txt-input" value="<?=$data_pelanggan['password']?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Status :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_kategori" class="txt-input" value="<?=$status?>" readonly>
                                </p>                                <p class="form-row">
                                    <a href="index.php?page=pelanggan" id="fid-name" name="edit" class="btn btn-danger">Kembali</a>
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