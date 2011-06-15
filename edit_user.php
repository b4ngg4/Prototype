<?php
	require "model/tulisDB.php";
	$nilai	= $_POST;
	$kunci	= array_keys($nilai);
	for($i=0;$i<count($kunci);$i++){
		$$kunci[$i]	= $nilai[$kunci[$i]];
	}
	if($aksi=="reset"){
		$link 	= new tulisDB();
		$que2	= "UPDATE tm_karyawan SET kar_pass=MD5('saas') WHERE kar_id='$kar_id'";
		mysql_query($que2) or die(errorHD::salahDB(array(mysql_errno(),mysql_error(),$que2)));
		$link->tutup();
		$errorMess 	= "Password telah direset";
?>
<input id="errMess" type="hidden" value="<?=$errorMess?>"/>
<?php
	}
	else{
		if(strlen(trim($kar_id))==0 or strlen(trim($kar_nama))==0){
			$errorMess 	= "Informasi pengguna belum lengkap";
		}
		else{
			$link 	= new bacaDB();
			$que0	= "SELECT *FROM tm_karyawan WHERE kar_id='$kar_id'";
			$res0	= mysql_query($que0) or die(errorHD::salahDB(array(mysql_errno(),mysql_error(),$que0)));
			$row0	= mysql_num_rows($res0);
			$link->tutup();
			if($row0==1 and $kar_id<>$old_id){
				$errorMess 	= "Informasi ID telah terdaftar";
			}
			else{
				$link 	= new tulisDB();
				if($aksi=="tambah"){
					$que2	= "INSERT INTO tm_karyawan(kar_id,kar_pass,kar_nama,kar_jabatan,kp_kode,grup_id) VALUES('$kar_id',MD5('saas'),'$kar_nama','$kar_jabatan','$kp_kode','$grup_id')";
				}
				else if($aksi=="edit"){
					$que2	= "UPDATE tm_karyawan SET kar_id='$kar_id',kar_nama='$kar_nama',kar_jabatan='$kar_jabatan',kp_kode='$kp_kode',grup_id='$grup_id' WHERE kar_id='$old_id'";
				}
				mysql_query($que2) or die(errorHD::salahDB(array(mysql_errno(),mysql_error(),$que2)));
				$link->tutup();
				$errorMess 	= "Informasi pengguna telah disimpan";
			}
		}
?>
<input id="errMess" type="hidden" value="<?=$errorMess?>"/>
<input type="button" value="Simpan" onclick="simpan('simpan')"/>
<input type="button" class="form_button" value="Kembali" onclick="buka('kembali')"/>
<?php
	}
?>
