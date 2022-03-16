<div class="page-contain login-page">

<!-- Main content -->
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Go to Register form-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="register-in-container">
                    <div class="intro">
                        
                        <?php
                            //membuat kd produk otomatis
                            $query = mysqli_query($koneksi, "select max(id_user) AS kodeTerbesar FROM tbl_user");
                            $data = mysqli_fetch_array($query);
                            $id_konsumen_last = $data['kodeTerbesar'];
                                                            
                            $urutan = (int) substr($id_konsumen_last, 3, 3);
                                                            
                            $urutan++;
                                                            
                            $huruf = "US";
                            $id_konsumen_last = $huruf.sprintf("%03s", $urutan);
                            //selesai
                        ?>

                        <br><h4 class="box-title"><center>Data User</h4>
                        <div class="signin-container">
                            <form action="" name="frm-login" method="post" enctype="multipart/form-data">
                                <p class="form-row">
                                    <label for="fid-name">ID User : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="id_user" class="txt-input" value="<?=$id_konsumen_last?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Nama User : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_user" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Username : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="username" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Password : <span class="requite">*</span></label>
                                    <input type="password" id="fid-name" name="password" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Level : <span class="requite">*</span></label>
                                    <select name="level" required>
                                        <option value="Admin">Admin</option>
                                        <option value="Pemilik">Pemilik</option>
                                    </select>
                                </p>
                                <br><br>
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-submit btn-bold" type="submit" name="simpan">Simpan</button>
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

    $id_user = $_POST['id_user'];
	$nama_user = $_POST['nama_user'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
    $level = $_POST['level'];

    $query_add = mysqli_query($koneksi, "INSERT into tbl_user (id_user, nama_user, username, password, level) VALUES ('$id_user','$nama_user','$username','$password','$level')");

        if($query_add){
            ?>
            <script>
                alert ('User berhasil ditambahkan');
                window.location.href = "index.php?page=users";
            </script>
        <?php
    } else {
       ?>

		<script>
            alert ('User gagal ditambahkan');
            window.location.href = "index.php?page=users";
		</script>	
	<?php	
	}	
}
?>