<?php
	if($erno) die();
	if(!isset($pg)) $pg = 1;
	$next_page = $pg + 1;
	$back_page = $pg - 1;
?>
<h2><?php echo _NAME; ?> | Halaman : <?php echo $pg; ?></h2>
<hr/>
<fieldset>
	<input type="button" value="Back" onclick="buka('back')"/>
	<input type="button" value="Next" onclick="buka('next')"/>
	<input type="hidden" class="next" name="pg" value="<?php echo $next_page; ?>"/>
	<input type="hidden" class="back" name="pg" value="<?php echo $back_page; ?>"/>
	<input type="hidden" class="next back" name="targetUrl" value="test/test_buka.php"/>
	<input type="hidden" class="next back" name="targetId" value="content"/>
	<input type="hidden" class="next back" name="appl_name" value="<?php echo _NAME; ?>"/>
	<input type="hidden" class="next" name="dump" value="0"/>
</fieldset>