<div class="page-contain login-page">

<!-- Main content -->
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Go to Register form-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="register-in-container">
                    <div class="intro">
                        <h4 class="box-title">Edit Data Kategori</h4>
                        <?php

                        $id=$_GET['id'];

                        $kategori = mysqli_query($koneksi,"SELECT * FROM tbl_kategori WHERE id_kategori='$id'");
                        $data_kategori = mysqli_fetch_array($kategori);

                        ?>
                        
                       <div class="signin-container">
                            <form action="" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="fid-name">Nama Kategori :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_kategori" class="txt-input" value="<?=$data_kategori['nama_kategori']?>" required>
                                    <input type="hidden" id="fid-name" name="id_kategori" class="txt-input" value="<?=$data_kategori['id_kategori']?>" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Keterangann : <span class="requite">*</span></label>
                                    <textarea cols="200" rows="5" id="fid-name" name="keterangan" class="txt-input"><?=$data_kategori['keterangan']?></textarea>
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
	
	$id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];
	$keterangan = $_POST['keterangan'];
	
	$query_add = mysqli_query($koneksi, "UPDATE tbl_kategori SET nama_kategori='$nama_kategori', keterangan='$keterangan' WHERE id_kategori='$id_kategori' ");
	
	if($query_add){
	//	var_dump($query_add);
        ?>
		<script>
			alert ('Data berhasil di ubah');
       		window.location.href = "index.php?page=add_produk";
		</script>
	<?php
	} else {
   ?>
		<script>
			alert ('Data Gagal diubah, Tunggu beberapa saat lagi !');
            window.location.href = "index.php?page=add_produk";
		</script>	
	<?php	
	}
	
}
?>