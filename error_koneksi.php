<?php
	/** getParam 
		memindahkan semua nilai dalam array POST ke dalam
		variabel yang bersesuaian dengan masih kunci array
	*/
	$nilai	= $_GET;
	$kunci	= array_keys($nilai);
	for($i=0;$i<count($kunci);$i++){
		$$kunci[$i]	= $nilai[$kunci[$i]];
	}
	/* getParam **/
?>
<div id="error_koneksi" class="peringatan">
<div class="notice center large">
	Terjadi kesalahan pada sistem database<br/>Nomor Tiket : <?php echo substr($appl_tokn,-4); ?>
	<br/><input type="button" value="Tutup" onclick="tutup('error_koneksi')"/>
</div>
</div>
