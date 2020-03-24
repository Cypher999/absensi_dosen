<?php
session_start();
require_once 'control/user/main.php';
$mod_m=new user_control();
$mod_m->setTableName("user");
$sql_m=$mod_m->search_data("id",$_SESSION["id_user_absen"],"","");
$isi_m=mysqli_fetch_assoc($sql_m);
$nama_user=$isi_m["nm_user"];
$pass_lama=$isi_m["pass"];
if($_POST["lama"]==$pass_lama){
	if($_POST["baru"]==$_POST["konf"]){
		$var=array("id","pass");
		$val=array($_SESSION["id_user_absen"],$_POST["baru"]);
		$mod_m->setvar($var,$val);
		$sql_ubah_pass=$mod_m->edit_data();
		echo "<script>window.location.href='index.php';</script>";
	}
	else{
		echo "<script>alert('password konfirmasi tidak sama');window.location.href='index.php';</script>";
	}
}
else{
	echo "<script>alert('password lama salah');window.location.href='index.php';</script>";
}
?>