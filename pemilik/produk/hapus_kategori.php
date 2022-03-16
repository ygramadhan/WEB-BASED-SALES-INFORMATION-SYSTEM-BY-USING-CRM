<?php

	$id_kategori = $_GET['id'];
	
	$hapus = mysqli_query($koneksi, "DELETE FROM tbl_kategori WHERE id_kategori='$id_kategori' ");
	
	if($hapus){
	//	var_dump($query_add);
        ?>
		<script>
			alert ('Kategori berhasil di hapus');
       		window.location.href = "index.php?page=add_produk";
		</script>
	<?php
	} else {
   ?>
		<script>
			alert ('Kategori gagal di hapus, Silahkan hapus produk dengan kategori terkait !');
            window.location.href = "index.php?page=add_produk";
		</script>	
	<?php	
	}
	
?>