<?php
session_start();
require_once 'control/absent/main.php';
require_once 'control/user/main.php';
$mod_m=new user_control();
$mod_m->setTableName("user");
$sql=$mod_m->search_data("id",$_SESSION["id_user_absen"],"","");
$isi=mysqli_fetch_assoc($sql);
$nama_user=$isi["nm_user"];

$us=new absen();
$us->setTableName("absen");
$id_data=0;
$tgl=date("Y/m/d");
$jm=date("H:i");
$sql_cek=$us->select_all("id_data");
if(mysqli_num_rows($sql_cek)>0){
	while($isi=mysqli_fetch_assoc($sql_cek)){
		$id_data=$isi["id_data"];
	}
}
$id_data=$id_data+1;
$var=array("id_data","nidn","tgl","jam","absen","ket","status");
$val=array($id_data,$nama_user,$tgl,$jm,$_POST["status"],$_POST["ket"],"P");
$us->setvar($var,$val);
$sql_simpan=$us->save_data();
if($sql_simpan){
		echo "<script>window.location.href='index.php';</script>";
}
else{
	echo mysqli_error($us->con);
}
?>