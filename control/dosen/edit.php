<?php
session_start();
require_once 'control/dosen/main.php';
$dsn=new dosen();
$dsn->setTableName("dosen");
$var=array('nidn','nm_dosen','alt','jekel');
$val=array($_POST["nidn"],$_POST["nm"],$_POST["alt"],$_POST["jekel"]);
$dsn->setvar($var,$val);
$sql_simpan_dosen=$dsn->edit_data();

if(($_FILES["foto"]["name"]!='')&&($_FILES["foto"]["size"]!='0')){
	$cek_file="image/".$_POST["nidn"].".jpg";
	if(file_exists($cek_file)){
		unlink($cek_file);
	}
$name_file=$_FILES["foto"]["name"];
$fl=$_FILES["foto"]["tmp_name"];
move_uploaded_file($fl, "image/".$_POST["nidn"].".jpg");
}

echo "<script>window.location.href='index.php?p=dosen';</script>";
?>