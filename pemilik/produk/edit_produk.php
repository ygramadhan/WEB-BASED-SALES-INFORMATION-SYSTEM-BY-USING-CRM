<div class="page-contain login-page">

<!-- Main content -->
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Go to Register form-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="register-in-container">
                    <div class="intro">
                        <h4 class="box-title">Edit Produk</h4>
                        <?php

                        $id=$_GET['id'];

                        $produk = mysqli_query($koneksi,"SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori WHERE tbl_produk.kd_produk='$id'");
                        $data_produk = mysqli_fetch_array($produk);

                        ?>
                        
                       <div class="signin-container">
                            <form action="" name="frm-login" method="post" enctype="multipart/form-data">
                                <p class="form-row">
                                    <label for="fid-name">Kode Produk :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="kd_produk" class="txt-input" value="<?=$data_produk['kd_produk']?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Nama Produk :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_produk" class="txt-input" value="<?=$data_produk['nama_produk']?>" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Pilih Kategori : <span class="requite">*</span></label>
                                    <select name="id_kategori" required>
                                        <?php
                                        $kategori1 = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                                        while($data_kategori1=mysqli_fetch_array($kategori1)){
                                            echo "<option value='".$data_kategori1['id_kategori']."'>".$data_kategori1['nama_kategori']."</option>";
                                        }
                                        ?>
                                    </select>
                                </p>
                                <BR><br>
                                <p class="form-row">
                                    <label for="fid-name">Berat :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="berat" class="txt-input" value="<?=$data_produk['berat']?>" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Harga :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="harga" class="txt-input" value="<?=$data_produk['harga']?>" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Stok :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="stok" class="txt-input" value="<?=$data_produk['stok']?>" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Diskon :<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="diskon" class="txt-input" value="<?=$data_produk['diskon']?>" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Deskripsi :<span class="requite">*</span></label>
                                    <textarea cols="200" rows="5" id="fid-name" name="deskripsi" class="txt-input" required><?=$data_produk['deskripsi']?></textarea>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Gambar : <span class="requite">*</span></label>
                                    <img src="produk/pict/<?=$data_produk['gambar']?>" alt="" required>
                                    <input type="file" id="fid-name" name="gambar" class="txt-input" value="">
                                    <input type="hidden" id="fid-name" name="gambar1" class="txt-input" value="<?=$data_produk['gambar']?>">
                                </p>
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

    $kd_produk = $_POST['kd_produk'];
	$nama_produk = $_POST['nama_produk'];
	$id_kategori = $_POST['id_kategori'];
	$berat = $_POST['berat'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
	$diskon = $_POST['diskon'];
    $deskripsi = $_POST['deskripsi'];
    $gambar1 = $_POST['gambar1'];

    $namaFile = $_FILES['gambar']['name'];
    $namaSementara = $_FILES['gambar']['tmp_name'];

    if($namaFile!="") {

        $foto = $namaFile;
        $dir_foto = $namaSementara;

        // tentukan lokasi file akan dipindahkan
    $dirUpload = 'produk/pict';

    // pindahkan file
    $terupload = move_uploaded_file($dir_foto, "$dirUpload/$foto");
    } else {
        $foto = $gambar1;
    }

    $query_add = mysqli_query($koneksi, "UPDATE tbl_produk SET nama_produk='$nama_produk', id_kategori='$id_kategori', berat='$berat', harga='$harga',stok='$stok',gambar='$foto', diskon='$diskon', deskripsi='$deskripsi' WHERE kd_produk='$kd_produk'");

    if($query_add){
            ?>
            <script>
                alert ('Produk berhasil diubah');
                window.location.href = "index.php?page=produk&view=tabel";
            </script>
        <?php
    } else {
       ?>
		<script>
            alert ('Produk gagal diubah');
            //window.location.href = "index.php?page=add_produk";
		</script>	
	<?php	
	}
}
?>