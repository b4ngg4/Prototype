<?php
	include "fungsi.php";
	$formId = getToken();
?>
<div id="<?php echo $formId; ?>" class="peringatan">
<div class="pesan">
<?php
	$kelas = $_POST['kelas'];
	echo $_POST['pesan']."<br/>";
?>
	<input type="button" value="Proses" onclick="buka('<?=$kelas?>')"/>
	<input type="button" value="Tutup"  onclick="tutup('<?php echo $formId; ?>')"/>
</div>
</div>