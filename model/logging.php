<?php
	class errorLog{
		public function errorDB($pesan){
			$fileLOG	= "_data/errorDB.csv";
			$pesan		= array_merge(array(date('Y-m-d H:i:s'),_TOKN,_KODE,_USER,_HOST),$pesan);
			$pesan		= implode(";",$pesan)."\n";
			$openLOG	= fopen($fileLOG, 'a');
			fwrite($openLOG, $pesan);
			fclose($openLOG);
		}
		public function logging($mess){
			$fileLOG	= "_data/logDB.csv";
			$mess		= array_merge(array(date('Y-m-d H:i:s'),_TOKN,_KODE,_USER,_HOST),$mess);
			$mess		= implode(";",$mess)."\n";
			$openLOG	= fopen($fileLOG, 'a');
			fwrite($openLOG, $mess);
			fclose($openLOG);
		}
		public function errorDie($mess){
			self::errorDB($mess);
			header("Location: ./error_koneksi.php?appl_tokn="._TOKN."");
		}
	}
?>