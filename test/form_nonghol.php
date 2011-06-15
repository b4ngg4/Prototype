<?php
	if($errno) die();
	$formId	= getToken();
?>
<div class="prepend-6 append-6">
<h2><?=_NAME?></h2><hr/>
<div id="<?php echo $formId; ?>">
	<input type="hidden" class="tambah" name="errorUrl" 	value="test/template_form_popup.php"/>
	<input type="hidden" class="tambah" name="pesan" 		value="Yakin akan mengtambah data ini!"/>
	<input type="button" value="Tonghol" onclick="nonghol('tambah')">
</div>
</div>