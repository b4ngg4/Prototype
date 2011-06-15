<?php
	/* getParam **/
	$mess = false;
	if(strlen($pel_no) != 6){
		$mess = "Tiket : ".substr($appl_tokn,-4)."<br/>Data entry harus 6 digit angka!";
	}
?>
<input type="hidden" id="<?php echo $cekMess?>" value="<?php echo $mess; ?>"/>