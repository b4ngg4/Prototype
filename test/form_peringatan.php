<?php
	if($errno) die();
	$formId	= getToken();
?>
<div class="prepend-6 append-6">
<h2><?=_NAME?></h2><hr/>
<div id="<?php echo $formId; ?>">
	<input type="hidden" class="hapus" name="targetId" 	value="<?php echo $formId; ?>"/>
	<input type="hidden" class="hapus" name="targetUrl" value="test/proses.php"/>
	<input type="hidden" class="hapus" name="dump"	 	value="1"/>
	<input type="hidden" class="hapus" name="proses" 	value="hapus"/>
	<input type="hidden" class="hapus" name="pesan" 	value="Yakin akan menghapus data ini!"/>
	<input type="button" value="Hapus" onclick="peringatan('hapus')">
</div>
</div>