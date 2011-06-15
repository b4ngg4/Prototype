<?php
	if($erno) die();
	$formId = getToken();
?>
<div id="<?php echo $formId; ?>" class="peringatan">
<div class="pesan">
<div class="span-14 right large">[<a title="Tutup jendela ini" onclick="tutup('<?php echo $formId; ?>')">Tutup</a>]</div>
<h3>Form Title</h3>
<hr/>
</div>
</div>