<?php
	if($erno) die();
	if(!isset($appl_tokn)) define("_TOKN",getToken());
	$nama = "abcd";
	for($i=1;$i<50;$i++){
		$kode		= str_repeat('0',3 - strlen($i)).$i;
		$data[$i] 	= array("kode" => $kode,"nama" => str_shuffle($nama.$kode));
	}
?>
<h2><?=_NAME?></h2>
<hr/>
<table>
	<tr class="table_head">
		<td>No</td>
		<td>Grup</td>
	</tr>
<?php
	for($i=1;$i<count($data);$i++){
		$klass 	= "table_cell1";
		if(($i%2) == 0){
			$klass = "table_cell2";
		}
?>
	<tr class="<?php echo $klass; ?>">
		<td><?php echo $data[$i]['kode']; 	?></td>
		<td><?php echo $data[$i]['nama']; 	?></td>
	</tr>
<?php
	}
?>
	<tr class="table_cont_btm"><td colspan="2">&nbsp;</td></tr>
</table>