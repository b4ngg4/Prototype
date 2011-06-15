<?php
	if($erno) die();
	$cekMess	= getToken();
	$mess 		= false;
	if(!isset($appl_tokn)) define("_TOKN",getToken());
?>
<h2><?php echo _NAME?></h2>
<input type="hidden" id="<?php echo $errorId; ?>" value="<?php echo $mess; ?>"/>
<!-- kebutuhan tracking untuk aplikasi billing : appl_kode,appl_name,appl_file,appl_proc,appl_tokn -->
<input type="hidden" class="periksa" 	name="appl_kode"	value="<?php echo _KODE; 		?>"/>
<input type="hidden" class="periksa" 	name="appl_name"	value="<?php echo _NAME; 		?>"/>
<input type="hidden" class="periksa" 	name="appl_file"	value="<?php echo _FILE; 		?>"/>
<input type="hidden" class="periksa" 	name="appl_proc"	value="<?php echo _PROC; 		?>"/>
<input type="hidden" class="periksa" 	name="appl_tokn" 	value="<?php echo _TOKN; 		?>"/>
<input type="hidden" class="periksa" 	name="errorId" 		value="<?php echo getToken(); 	?>"/>
<fieldset>
	<div class="span-4"></div>
	<div class="span-5 border">
		<input type="text" class="periksa" name="pel_no" maxlength="6" value="1234"/>
		<input type="button" value=">>" onclick="periksa('periksa')"/>
		<input type="hidden" class="periksa" name="targetUrl"	value="test/proses_buka.php"/>
		<input type="hidden" class="periksa" name="targetId" 	value="tujuan"/>
		<input type="hidden" class="periksa" name="dump"	 	value="0"/>
		<input type="hidden" class="periksa" name="cekUrl" 		value="test/proses_periksa.php"/>
		<input type="hidden" class="periksa" name="cekId" 		value="peringatan"/>
		<input type="hidden" class="periksa" name="cekMess" 	value="<?php echo $cekMess; ?>"/>
	</div>
	<div id="tujuan" class="span-8"></div>
</fieldset>