<?php
	$mess = false;
	$mess = "Tiket : ".substr(_TOKN,-4)."<br/>Proses : ".$appl_name;
?>
<h2><?php echo _NAME?></h2>
<input type="hidden" id="<?php echo $errorId; ?>" value="<?php echo $mess; ?>"/>
<!-- kebutuhan tracking untuk aplikasi billing : appl_kode,appl_name,appl_file,appl_proc,appl_tokn -->
<input type="hidden" class="buka" 	name="appl_kode"	value="<?php echo _KODE; ?>"/>
<input type="hidden" class="buka" 	name="appl_name"	value="<?php echo _NAME; ?>"/>
<input type="hidden" class="buka" 	name="appl_file"	value="<?php echo _FILE; ?>"/>
<input type="hidden" class="buka" 	name="appl_proc"	value="<?php echo _PROC; ?>"/>
<input type="hidden" class="buka" 	name="appl_tokn" 	value="<?php echo _TOKN; ?>"/>
<fieldset>
	<div class="span-4"></div>
	<div class="span-5 border">
		<!-- event trigger untuk memanggil fungsi kontrol AJAX -->
		<input type="button"	onclick="buka('buka')" 				value=">>"/>
		<!-- parameter yang akan dilewatkan : pel_no -->
		<input type="text"		class="buka" 	name="pel_no"	 	value="000123" maxlength="6"/>
		<!-- parameter tetap yang harus didefinisikan untuk fungsi buka -->
		<!-- 	1. targetUrl = definisi file proses yang akan dipanggil -->
		<!-- 	2. targetId	 = definisi id element hasil dari proses	-->
		<input type="hidden" 	class="buka" 	name="targetUrl" 	value="test/proses_buka.php"/>
		<input type="hidden" 	class="buka" 	name="targetId"		value="tujuan"/>
		<!-- 	3. errorId	 = definisi id element input hasil dari error proses -->
		<input type="hidden" 	class="buka" 	name="errorId" 		value="errProses"/>
	</div>
	<div class="span-1"></div>
	<div id="tujuan" class="span-7"></div>
</fieldset>