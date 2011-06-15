<?php
	function getToken(){
		$acak	= mt_rand(1,9999);
		return date('ymdHis').str_repeat('0',4-strlen($acak)).$acak;
	}
	function pilihan($data,$param){
		$hasil		= "<select ";
		$paramKey	= array_keys($param);
		for($i=0;$i<count($param);$i++){
			if($paramKey[$i] == "disabled" or $paramKey[$i] == "selected" or $paramKey[$i] == "readonly"){
				$disabled = $param["disabled"];
				$selected = $param["selected"];
				$readonly = $param["readonly"];
			}
			else{
				$hasil	.= $paramKey[$i]."=\"".$param[$paramKey[$i]]."\" ";
			}
		}
		$hasil 		.= $disabled." ".$readonly.">";
		for($i=0;$i<count($data);$i++){
			$dataKey	= array_keys($data[$i]);
			$pilihan 	= "";
			if($data[$i][$dataKey[0]] == $selected){
				$pilihan = "selected";
			}
			$hasil .= "<option value=\"".$data[$i][$dataKey[0]]."\" ".$pilihan.">".$data[$i][$dataKey[1]]."</option>";
		}	
		$hasil .= "</select>";
		return $hasil;
	}
	function cek_pass(){
		session_start();
		if(!isset($_SESSION["User_c"])){
			header("Location: ../");
		}
		else{
			define("_USER",$_SESSION["User_c"]);
			define("_NAME",$_SESSION["Name_c"]);
			define("_GRUP",$_SESSION["Group_c"]);
			return true;
		}
	}
?>