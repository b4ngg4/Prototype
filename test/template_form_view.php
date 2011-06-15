<?php
	if($erno) die();
	if(!isset($appl_tokn)) define("_TOKN",getToken());
	$kp_kode = 10;

	/* koneksi database */
	/* link : link baca */
	$mess 	= "user : ".$DUSER." tidak bisa terhubung ke server : ".$DHOST;
	$link 	= mysql_connect($DHOST,$DUSER,$DPASS) or die(errorLog::errorDie(array($mess)));
	try{
		if(!mysql_select_db($DNAME,$link)){
			throw new Exception("user : ".$DUSER." tidak bisa terhubung ke database : ".$DNAME);
		}
	}
	catch (Exception $e){
		errorLog::errorDB(array($e->getMessage()));
		$mess = "Terjadi kesalahan pada sistem<br/>Nomor Tiket : ".substr(_TOKN,-4);
		$klas = "error";
		$erno = false;
	}

	/** Pagination */
	if(isset($pg) and $pg>1){
		$next_page 	= $pg + 1;
		$pref_page 	= $pg - 1;
		$pref_mess	= "<input type=\"button\" value=\"<<\" class=\"form_button\" onClick=\"buka('pref_page')\"/>";
	}
	else{
		$pg 		= 1;
		$next_page 	= 2;
		$pref_page 	= 1;
	}
	$jml_perpage 	= 15;
	$limit_awal	 	= ($pg - 1) * $jml_perpage;
	
	/** retrieve view rayon */
	try{
		$que0 = "SELECT *FROM tr_dkd WHERE kp_kode='$kp_kode' LIMIT $limit_awal,$jml_perpage";
		if(!$res0 = mysql_query($que0,$link)){
			throw new Exception($que0);
		}
		else{
			$i = 0;
			while($row0 = mysql_fetch_array($res0)){
				$data[] = $row0;
				$i++;
			}
			/*	pagination : menentukan keberadaan operasi next page	*/
			if($i==$jml_perpage){
				$next_mess	= "<input type=\"button\" value=\">>\" class=\"form_button\" onClick=\"buka('next_page')\"/>";
			}
			$mess = false;
		}
	}
	catch (Exception $e){
		errorLog::errorDB(array($que0));
		$mess = $e->getMessage();
	}
	if(!$erno) mysql_close($link);
?>
<h2><?php echo _NAME?></h2>
<input type="hidden" id="errorId"/>
<table class="table_info" >
	<tr class="table_cont_btm">
		<td colspan="7" class="right">Hal : <?php echo $pg; ?></td>
	</tr>
	<tr class="table_cont_btm"> 
		<td width="5%">No</td>
		<td width="10%">Kode</td>   
		<td width="9%">Tgl Catat</td>        
		<td width="18%">Nama Petugas</td>
		<td width="38%">Jalan</td>
		<td width="20%">Manage</td>
	</tr>
<?php
	for($i=0;$i<count($data);$i++){
		$row0 = $data[$i];
		$nomor	= ($i+1)+(($pg-1)*$jml_perpage);
		$klas 	= "table_cell1";
		if(($i%2) == 0){
			$klas = "table_cell2";
		}
?>
	<tr valign="top" class="<?php echo $klas; ?>">
		<td><?php echo $nomor;				?></td>
		<td><?php echo $row0['dkd_kd'];		?></td>
		<td><?php echo $row0['dkd_tcatat']; ?></td>
		<td><?php echo $row0['dkd_pembaca'];?></td>
		<td><?php echo $row0['dkd_jalan'];	?></td>
		<td>
			<input type="hidden" class="rinci_<?php echo $i; ?>" name="dkd_kd"		value="<?php echo $row0['dkd_kd']; ?>"/>
			<input type="hidden" class="rinci_<?php echo $i; ?>" name="appl_kode"	value="<?php echo _KODE; ?>"/>
			<input type="hidden" class="rinci_<?php echo $i; ?>" name="appl_name"	value="<?php echo _NAME; ?>"/>
			<input type="hidden" class="rinci_<?php echo $i; ?>" name="appl_file"	value="<?php echo _FILE; ?>"/>
			<input type="hidden" class="rinci_<?php echo $i; ?>" name="appl_proc"	value="<?php echo _PROC; ?>"/>
			<input type="hidden" class="rinci_<?php echo $i; ?>" name="appl_tokn" 	value="<?php echo _TOKN; ?>"/>
			<input type="hidden" class="rinci_<?php echo $i; ?>" name="kembali" 	value="<?php echo $pg; ?>"/>
			<input type="hidden" class="rinci_<?php echo $i; ?>" name="targetUrl" 	value="rinci_info.php"/>
			<input type="hidden" class="rinci_<?php echo $i; ?>" name="targetId" 	value="content"/>
			<input type="hidden" class="rinci_<?php echo $i; ?>" name="errorId"   	value="errMess"/>
			<img src="./images/edit.gif" title="Lihat Rincian"/>
		</td>
	</tr>

<?php

	}
?>
	<tr class="table_cont_btm">
		<td colspan="5" class="left"></td>
		<td class="right">
			<input type="hidden" class="next_page pref_page" name="appl_kode" value="<?php echo _KODE; ?>"/>
			<input type="hidden" class="next_page pref_page" name="appl_name" value="<?php echo _NAME; ?>"/>
			<input type="hidden" class="next_page pref_page" name="appl_file" value="<?php echo _FILE; ?>"/>
			<input type="hidden" class="next_page pref_page" name="appl_proc" value="<?php echo _PROC; ?>"/>
			<input type="hidden" class="next_page pref_page" name="appl_tokn" value="<?php echo _TOKN; ?>"/>
			<input type="hidden" class="next_page pref_page" name="targetUrl" value="<?php echo _FILE; ?>"/>
			<input type="hidden" class="next_page pref_page" name="targetId"  value="content"/>
			<input type="hidden" class="next_page pref_page" name="errorId"   value="errMess"/>
			<input type="hidden" class="next_page" name="pg" value="<?php echo $next_page; ?>"/>
			<input type="hidden" class="pref_page" name="pg" value="<?php echo $pref_page; ?>"/>
			<?php echo $pref_mess; ?>
			<?php echo $next_mess; ?>
		</td>
	</tr>
</table>