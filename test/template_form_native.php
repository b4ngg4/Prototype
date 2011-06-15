<?php
	define("_TOKN",getToken());
	if($erno) die();
	switch($proses){
		case "rinci":
?>
<fieldset class="notice">Halaman Rinci</fieldset>
<?php
			break;
		default:
			if($trek) errorLog::logging(array("membuka form native"));
			$periksaId 	= getToken();
			$messId 	= getToken();
?>
<input type="hidden" class="periksa" name="appl_kode"	value="<?php echo _KODE; 		?>"/>
<input type="hidden" class="periksa" name="appl_name"	value="<?php echo _NAME; 		?>"/>
<input type="hidden" class="periksa" name="appl_file"	value="<?php echo _FILE; 		?>"/>
<input type="hidden" class="periksa" name="appl_proc"	value="<?php echo _PROC; 		?>"/>
<input type="hidden" class="periksa" name="appl_tokn"	value="<?php echo _TOKN; 		?>"/>
<input type="hidden" class="periksa" name="targetId" 	value="content"/>
<input type="hidden" class="periksa" name="targetUrl"	value="<?php echo _FILE; 		?>"/>
<input type="hidden" class="periksa" name="cekUrl"		value="<?php echo _PROC; 		?>"/>
<input type="hidden" class="periksa" name="cekId"		value="peringatan"/>
<input type="hidden" class="periksa" name="cekMess"		value="<?php echo $messId; 		?>"/>
<input type="hidden" class="periksa" name="proses" 		value="rinci"/>
<input type="hidden" class="periksa" name="dump" 		value="0"/>
<div class="prepend-6 append-6">
<h2><?=_NAME?></h2><hr/>
<span id="<?php echo $periksaId; ?>"></span>
<fieldset>
	<div class="prepend-2 span-2 left">
		Nomor SL
	</div>
	<div>:
		<input type="text" size="6" class="periksa" name="pel_no" maxlength="6" value="014178"/>
	</div>
	<div class="prepend-top prepend-2 span-2 left">
		Rekening
	</div>
	<div class="prepend-top">:
		<input type="text" size="2" class="periksa" name="rek_bln" maxlength="2" value="1"/>
		-
		<input type="text" size="4" class="periksa" name="rek_thn" maxlength="4" value="2011"/>
	</div>
	<div class="prepend-top prepend-4">
		&nbsp;<input type="button" class="form_button" value="Periksa" onclick="periksa('periksa')"/>
	</div>
</fieldset>
</div>
<?php
	}
?>