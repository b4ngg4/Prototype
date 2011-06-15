<?php
	require "model/logging.php";
	require "model/setDB.php";
	require "fungsi.php";
	/** kode1 yang akan memindahkan semua nilai dalam array POST ke dalam */
	/*	variabel yang bersesuaian dengan masih kunci array */
	$nilai	= $_POST;
	$kunci	= array_keys($nilai);
	for($i=0;$i<count($kunci);$i++){
		$$kunci[$i]	= $nilai[$kunci[$i]];
	}
	/* kode1 **/
	
	define("_KODE",$appl_kode);
	define("_NAME",$appl_name);
	define("_FILE",$appl_file);
	define("_PROC",$appl_proc);
	define("_VIEW",$appl_view);
	define("_TOKN",getToken());
	try{
		$dbh = new PDO('mysql:host=localhost;dbname='.$DNAME, $DUSER, $DPASS);
		$que = "SELECT * from tm_users";
		if($res = $dbh->query($que)){
			while($row = $res->fetch()){
				$data[] = $row;
			}
		}
		else{
			errorLog::errorDB(array($que));
		}
		$dbh = null;
	}
	catch(PDOException $e){
		errorLog::errorDB(array($e->getMessage()));
	}
?>
<h2><?=_NAME?></h2>
<?=var_dump($data)?>