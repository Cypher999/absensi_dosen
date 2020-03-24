<?php
session_start();
require_once 'control/user/main.php';
$us=new user_control();
$us->setTableName("user");
$sql=$us->search_data("nm_user",$_POST["username"],"","");
if(mysqli_num_rows($sql)>0){
	$isi=mysqli_fetch_assoc($sql);
	if($isi["pass"]==$_POST["pass"]){
		$_SESSION["id_user_absen"]=$isi["id"];
		echo "<script>window.location.href='index.php';</script>";
	}
	else{
		echo "<script>alert('password salah');
		window.location.href='index.php';</script>";	
	}
}
else{
	echo "<script>alert('nama tidak ditemukan');
	window.location.href='index.php';</script>";	
}
?>