<div class="page-contain login-page">

<!-- Main content -->
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Go to Register form-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="register-in-container">
                    <div class="intro">
                        <h4 class="box-title">Edit User</h4>
                        <?php

                        $id=$_GET['id'];

                        $produk = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE id_user='$id'");
                        $data_produk = mysqli_fetch_array($produk);

                        ?>
                        
                       <div class="signin-container">
                            <form action="" name="frm-login" method="post" enctype="multipart/form-data">
                                <p class="form-row">
                                    <label for="fid-name">ID User :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="id_user" class="txt-input" value="<?=$data_produk['id_user']?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Nama User :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_user" class="txt-input" value="<?=$data_produk['nama_user']?>" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Username : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="username" class="txt-input" value="<?=$data_produk['username']?>" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Level : <span class="requite">*</span></label>
                                    <select name="level" required>
                                        <option value="Admin">Admin</option>
                                        <option value="Pemilik">Pemilik</option>
                                    </select>
                                </p>
                                <br><br>
                                <p class="form-row">
                                    <button type="submit" id="fid-name" name="simpan" class="btn btn-primary">Edit</button>
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

if(isset($_POST['simpan'])) {

    $id_user = $_POST['id_user'];
	$nama_user = $_POST['nama_user'];
	$username = $_POST['username'];
	$level = $_POST['level'];

    $query_add = mysqli_query($koneksi, "UPDATE tbl_user SET nama_user='$nama_user', username='$username', level='$level' WHERE id_user='$id_user'");

    if($query_add){
            ?>
            <script>
                alert ('Data User berhasil diubah');
                window.location.href = "index.php?page=users";
            </script>
        <?php
    } else {
       ?>
		<script>
            alert ('Data user gagal diubah');
            //window.location.href = "index.php?page=add_produk";
		</script>	
	<?php	
	}
}
?>