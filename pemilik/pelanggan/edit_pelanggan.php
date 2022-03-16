<div class="page-contain login-page">

<!-- Main content -->
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Go to Register form-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="register-in-container">
                    <div class="intro">
                        <h4 class="box-title"><center>Edit Pelanggan</h4>
                        <?php

                        $id=$_GET['id'];

                        $pelanggan = mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$id'");                        
                        $data_pelanggan = mysqli_fetch_array($pelanggan);

                        if($data_pelanggan['jk']=="L"){
                            $jk ="<input type='radio' id='fid-name' name='jk' class='txt-input' value='L' checked>  Laki-Laki
                            &nbsp;&nbsp;&nbsp;<input type='radio' id='fid-name' name='jk' class='txt-input' value='P'>  Perempuan";
                            
                        } else {
                            $jk ="<input type='radio' id='fid-name' name='jk' class='txt-input' value='L' >  Laki-Laki
                            &nbsp;&nbsp;&nbsp;<input type='radio' id='fid-name' name='jk' class='txt-input' value='P' checked>  Perempuan";
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
                                    <input type="text" id="fid-name" name="nama_pelanggan" class="txt-input" value="<?=$data_pelanggan['nama_pelanggan']?>" required>
                                </p>
                                <p class="action-form">
                                    <label for="fid-name">Jenis Kelamin : <span class="requite">*</span></label><br>
                                    <?=$jk?>
                                </p>                                
                                <p class="form-row">
                                    <label for="fid-name">Tanggal Lahir :<span class="requite">*</span></label>
                                    <input type="date" id="fid-name" name="tgl_lahir" class="txt-input" value="<?=$data_pelanggan['tgl_lahir']?>" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Alamat :<span class="requite">*</span></label>
                                    <textarea cols="200" rows="5" id="fid-name" name="alamat" class="txt-input" required ><?=$data_pelanggan['alamat']?></textarea>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Telepon :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="telp" class="txt-input" value="<?=$data_pelanggan['telp']?>" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Email :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="email" class="txt-input" value="<?=$data_pelanggan['email']?>" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Username :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="username" class="txt-input" value="<?=$data_pelanggan['username']?>" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Password :<span class="requite">*</span></label>
                                    <input type="password" id="fid-name" name="password" class="txt-input" value="<?=$data_pelanggan['password']?>" required>
                                </p>
                                <p class="form-row">
                                    <button type="submit" id="fid-name" name="edit" class="btn btn-primary">Edit</button>
                                    <a href="index.php?page=add_produk" id="fid-name" name="edit" class="btn btn-danger">Kembali</a>
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

if(isset($_POST['edit'])) {

    $id_pelanggan = $_POST['id_pelanggan'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$jk = $_POST['jk'];
	$tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
	$email = $_POST['email'];
    $username = $_POST['username'];
    $password= md5($_POST['password']);

    $ubah = mysqli_query($koneksi, "UPDATE tbl_pelanggan SET nama_pelanggan='$nama_pelanggan', jk='$jk', tgl_lahir='$tgl_lahir', alamat='$alamat',telp='$telp',email='$email', username='$username', password='$password' WHERE id_pelanggan='$id_pelanggan' ");

    if($ubah){
            ?>
            <script>
                alert ('Data Pelanggan berhasil diubah');
                window.location.href = "index.php?page=pelanggan";
            </script>
        <?php
    } else {
       ?>
		<script>
            alert ('Data Pelanggan gagal ditambahkan');
            window.location.href = "index.php?page=edit_pelanggan";
		</script>	
	<?php	
	}	
}
?>