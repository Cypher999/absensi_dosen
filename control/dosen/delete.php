<?php
session_start();
require_once 'control/dosen/main.php';
require_once 'control/absent/main.php';
require_once 'control/user/main.php';
$dsn=new dosen();
$usr=new user_control();
$abs=new absen();
$dsn->setTableName("dosen");
$abs->setTableName("absen");
$usr->setTableName("user");
$dsn->delete_data("nidn",$_GET["nidn"]);
$abs->delete_data("nidn",$_GET["nidn"]);
$usr->delete_data("nm_user",$_GET["nidn"]);
	$cek_file="image/".$_GET["nidn"].".jpg";
	if(file_exists($cek_file)){
		unlink($cek_file);
	}
echo "<script>window.location.href='index.php?p=dosen';</script>";
?>