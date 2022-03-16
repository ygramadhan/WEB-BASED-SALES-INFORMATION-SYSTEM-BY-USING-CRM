<?php

	$id = $_GET['id'];
	
	$hapus = mysqli_query($koneksi, "DELETE FROM tbl_produk WHERE kd_produk='$id' ");
	
	if($hapus){
	//	var_dump($query_add);
        ?>
		<script>
			alert ('Data produk berhasil di hapus');
       		window.location.href = "index.php?page=produk&view&tabel=view";
		</script>
	<?php
	} else {
   ?>
		<script>
			alert ('Data produk gagal di hapus, Silahkan hapus produk dengan kategori terkait !');
            window.location.href = "index.php?page=produk&view&tabel=view";
		</script>	
	<?php	
	}
	
?>