<?php
class connect{
	var $con;
	function active(){
		$this->con=mysqli_connect("localhost","root","","dbabsen");
	}
	function disconnect(){
		mysqli_close($this->con);
	}
}
?>