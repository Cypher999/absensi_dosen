<?php
require_once 'control/connection.php';
class absen extends connect{
	var $var_name,$var_value,$table_name,$sql;
	function __construct(){
		$this->active();
	}
	function __destruct(){
		$this->disconnect();
	}
	function setvar($a,$b){
		$this->var_name=$a;
		$this->var_value=$b;
	}
	function setTableName($a){
		$this->table_name=$a;
	}
	function save_data(){
		$variable="";
		$value="";
		$blank="'";
		for($i=0;$i<count($this->var_name);$i++){
			if($i==((count($this->var_name))-1)){
				$variable=$variable.$this->var_name[$i];
				$value=$value.$blank.$this->var_value[$i].$blank;
			}
			else{
				$variable=$variable.$this->var_name[$i].",";
				$value=$value.$blank.$this->var_value[$i].$blank.",";
			}
		}
		$sql="insert into ".$this->table_name." (".$variable.") value (".$value.")";
		return mysqli_query($this->con,$sql);
	}
	function edit_data(){
		$variable="";
		$value="";
		$blank="'";
		$blank_close="'";
		for($i=1;$i<count($this->var_name);$i++){
			if($i==((count($this->var_name))-1)){
				$variable=$variable.$this->var_name[$i]."=".$blank.$this->var_value[$i].$blank;
			}
			else{
				$variable=$variable.$this->var_name[$i]."=".$blank.$this->var_value[$i].$blank.",";
			}
		}
		$sql="update ".$this->table_name." set ".$variable." where ".$this->var_name[0]."='".$this->var_value[0]."'";
		return mysqli_query($this->con,$sql);
	}
	function delete_data($a,$b){
		return mysqli_query($this->con,"delete from ".$this->table_name." where ".$a."='".$b."'");
	}
	function search_data($a,$b,$c,$d,$e,$f){
		if((empty($c))&&(empty($d))&&(empty($e))&&(empty($f))){
			return mysqli_query($this->con,"select * from ".$this->table_name." where ".$a."='".$b."'");
		}
		else if((empty($e))&&(empty($f))){
			return mysqli_query($this->con,"select * from ".$this->table_name." where ".$a."='".$b."' and ".$c."='".$d."'");	
		}
		else{
			return mysqli_query($this->con,"select * from ".$this->table_name." where ".$a."='".$b."' and ".$c."='".$d."' and ".$e."='".$f."'");		
		}
	}
	function select_all($a){
		return mysqli_query($this->con,"select * from ".$this->table_name." order by ".$a."");
	}
}
?>