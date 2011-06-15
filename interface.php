<?php
	require "model/setDB.php";
	require "model/logging.php";
	require "fungsi.php";
	/** getParam 
		memindahkan semua nilai dalam array POST ke dalam
		variabel yang bersesuaian dengan masih kunci array
	*/
	$nilai	= $_POST;
	$kunci	= array_keys($nilai);
	for($i=0;$i<count($kunci);$i++){
		$$kunci[$i]	= $nilai[$kunci[$i]];
	}
	/* getParam **/
	
	/** predefine parameter */
	$mess = false;
	$proc = false;
	$erno = false;
	$trek = true;
	define("_KODE",$appl_kode);
	define("_NAME",$appl_name);
	define("_FILE",$appl_file);
	define("_PROC",$appl_proc);
	define("_USER","admin");
	if(isset($appl_tokn)) define("_TOKN",$appl_tokn);
	/* predefine parameter **/

	/* periksa proses php aktif */
	if(isset($cekUrl)){
		$proc = $cekUrl;
		//$dump = false;
	}
	else if(isset($errorUrl)){
		$proc = $errorUrl;
	}
	else if(isset($targetUrl)){
		$proc = $targetUrl;
	}
	else{
		$mess = "File proses belum didefinisikan";
		$erno = true;
	}
	
	if($proc){
		if(is_readable($proc)){
			$mess = "File proses : ".$proc." ditemukan";
		}
		else{
			$mess = "File proses : ".$proc." tidak ditemukan";
			$erno = true;
		}
	}
	
	if($dump){
		$ernoId = getToken();
?>
<div id="<?php echo $ernoId; ?>">
	<div class="error left">
		<div><?php echo $mess; ?></div>
		<div>[<a title="Tutup pesan ini" onclick="tutup('<?php echo $ernoId; ?>')">TUTUP</a>]</div>
		<br/>
		<div class="notice center"><?php var_dump($_POST); ?></div>
	</div>
</div>
<?php
		$erno = true;
	}
	else if(!$erno){
		require $proc;
	}
	else{
		$ernoId = getToken();
		errorLog::errorDB(array($mess));
		$mess 	= $mess."<br/>Nomor Tiket : ".substr(_TOKN,-4);
?>
<div id="<?php echo $ernoId; ?>">
	<div class="error left">
		<div><?php echo $mess; ?></div>
		<div>[<a title="Tutup pesan ini" onclick="tutup('<?php echo $ernoId; ?>')">TUTUP</a>]</div>
		<br/>
		<div class="notice center"><?php var_dump($_POST); ?></div>
	</div>
</div>
<?php
	}
?>