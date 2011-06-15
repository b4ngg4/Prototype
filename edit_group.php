<?php
	$nilai	= $_POST;
	$kunci	= array_keys($nilai);
	for($i=0;$i<count($kunci);$i++){
		$$kunci[$i]	= $nilai[$kunci[$i]];
	}
	
	require "model/tulisDB.php";
	switch($aksi){
		case "simpan":
			$errorMess="Proses ini belum bisa digunakan";
?>
<input id="errMess" type="hidden" value="<?=$errorMess?>"/>
<?php
			break;
		case "list":
			$link = new bacaDB();
			$que1 = "SELECT appl_kode,appl_nama,appl_file,getMenu('$grup_id',appl_kode) as sts FROM tm_aplikasi WHERE ga_kode='$ga_kode'";
			$res1 = mysql_query($que1) or die(errorHD::salahDB(array(mysql_errno(),$que1)));
			if($level == 2){
				$width1 = "30px";
				$width2 = "130px";
			}
			else{
				$width1 = "0px";
				$width2 = "90px";
			}
?>
<div style="text-align:left;margin-left:<?=$width1?>">
	<img src="./images/searchbox.png" title="Rinci" onclick="togel('<?=$ga_kode?>')"/>
	<b><?=$ga_nama?></b>
</div>
<input type="hidden" id="togel_<?=$ga_kode?>" value="1"/>
<div id="<?=$ga_kode?>">
<?php
			while($row1 = mysql_fetch_object($res1)){
				$appl_kode = $row1->appl_kode;
				$appl_nama = $row1->appl_nama;
				$checked	= false;
				if($row1->sts == 1){
					$checked = "checked=\"true\"";
				}
				if(strlen($row1->appl_file)<4){
?>
<input type="hidden" class="buka_<?=$appl_kode?>" name="targetUrl" 	value="edit_grup.php"/>
<input type="hidden" class="buka_<?=$appl_kode?>" name="targetId" 	value="kotak_<?=$appl_kode?>"/>
<input type="hidden" class="buka_<?=$appl_kode?>" name="ga_kode"	value="<?=$appl_kode?>"/>
<input type="hidden" class="buka_<?=$appl_kode?>" name="ga_nama"	value="<?=$appl_nama?>"/>
<input type="hidden" class="buka_<?=$appl_kode?>" name="grup_id"	value="<?=$grup_id?>"/>
<input type="hidden" class="buka_<?=$appl_kode?>" name="aksi" 		value="list"/>
<input type="hidden" class="buka_<?=$appl_kode?>" name="level" 		value="2"/>
<div id="kotak_<?=$appl_kode?>" style="text-align:left;font-weight:bold"/>
	<span style="margin-left:30px">
		<img src="./images/searchbox.png" title="Rinci" onclick="buka('buka_<?=$appl_kode?>')"/>
		<?=$appl_nama?>
	</span>
</div>
<?php
				}
				else{
?>
	<span style="margin-left:<?=$width2?>">
		<input type="checkbox" class="simpan_<?=$appl_kode?>" <?=$checked?> onchange="$(this.className).value=this.checked"/>
		<input type="hidden" id="simpan_<?=$appl_kode?>" class="simpan" name="appl_kode['<?=$appl_kode?>']" value="<?=$row1->sts?>"/>
		<?=$appl_nama?><br/>
	</span>
<?
				}
			}
			$link->tutup();
?>
</div>
<?php
			break;
		case "detail":
			$link = new bacaDB();
			$que1 = "SELECT appl_nama FROM v_menu_grup WHERE grup_id='$grup_id'";
			$res1 = mysql_query($que1) or die(errorHD::salahDB(array(mysql_errno(),$que1)));
?>
			<img src="./images/searchbox.png" title="Rinci" onclick="togel('<?=$grup_id?>')"/>
			<input type="hidden" id="togel_<?=$grup_id?>" value="1"/>
			<div id="<?=$grup_id?>">
<?php
			while($row1 = mysql_fetch_object($res1)){
				echo $row1->appl_nama."<br/>";
			}
			$link->tutup();
?>
			</div>
<?php
			break;
		default:
			if(strlen(trim($grup_id))==0 or strlen(trim($grup_nama))==0){
				$errorMess 	= "Informasi grup belum lengkap";
			}
			else{
				$link = new bacaDB();
				$que0	= "SELECT *FROM tm_group WHERE grup_id='$grup_id'";
				$que1	= "SELECT *FROM tm_group WHERE grup_nama='$grup_nama'";
				$res0	= mysql_query($que0) or die(errorHD::salahDB(array(mysql_errno(),$que0)));
				$res1	= mysql_query($que1) or die(errorHD::salahDB(array(mysql_errno(),$que1)));
				$row0	= mysql_num_rows($res0);
				$row1	= mysql_num_rows($res1);
				$link->tutup();
				if($row0==1 and $grup_id<>$old_id){
					$errorMess 	= "Informasi kode grup telah terdaftar";
				}
				else if($row1==1){
					$errorMess 	= "Nama grup telah terdaftar";
				}
				else{
					$link 	= new tulisDB();
					if($aksi=="tambah"){
						$que2	= "INSERT INTO tm_group(grup_id,grup_nama) VALUES('$grup_id','$grup_nama')";
					}
					else if($aksi=="edit"){
						$que2	= "UPDATE tm_group SET grup_id='$grup_id',grup_nama='$grup_nama' WHERE grup_id='$old_id'";
					}
					mysql_query($que2) or die(errorHD::salahDB(array(mysql_errno(),$que2)));
					if(mysql_affected_rows()>0){
						$errorMess 	= "Informasi grup telah disimpan";
					}
					else{
						$errorMess 	= "Informasi grup gagal disimpan";
					}
					$link->tutup();
				}
			}
?>
<input id="errMess" type="hidden" value="<?=$errorMess?>"/>
<input type="button" class="form_button" value="Simpan" onclick="simpan('simpan')"/>
<input type="button" class="form_button" value="Kembali" onclick="buka('kembali')"/>
<?php
	}
?>