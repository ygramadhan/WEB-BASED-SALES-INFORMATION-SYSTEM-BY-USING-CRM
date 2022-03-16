<?php

if(isset($_POST['simpan'])) {
	
	$nama_kategori = $_POST['nama_kategori'];
	$keterangan = $_POST['keterangan'];
	
	$query_add = mysqli_query($koneksi, "INSERT into tbl_kategori (id_kategori, nama_kategori,keterangan) VALUES (null,'$nama_kategori','$keterangan')");
	
	if($query_add){
		?>
		<script>
			alert ('Kategori Berhasil Ditambahkan');
       		window.location.href = "index.php?page=add_produk";
		</script>
	<?php
	} else {
    ?>
		<script>
			alert ('Kategori Gagal Ditambahkan');
            window.location.href = "index.php?page=add_produk";
        </script>	
	<?php	
	}
}
?>