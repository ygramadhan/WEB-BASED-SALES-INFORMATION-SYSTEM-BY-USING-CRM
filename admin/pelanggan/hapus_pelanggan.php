<?php

	$id = $_GET['id'];
	
	$hapus = mysqli_query($koneksi, "DELETE FROM tbl_pelanggan WHERE id_pelanggan='$id'");
	
	if($hapus){
        ?>
		<script>
			alert ('Data Pelanggan berhasil di hapus');
       		window.location.href = "index.php?page=pelanggan";
		</script>
	<?php
	} else {
   ?>
		<script>
			alert ('Data Pelanggan gagal di hapus');
            window.location.href = "index.php?page=pelanggan";
		</script>	
	<?php	
	}
	
?>