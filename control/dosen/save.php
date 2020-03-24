<?php
session_start();
require_once 'control/dosen/main.php';
require_once 'control/user/main.php';
$dsn=new dosen();
$dsn->setTableName("dosen");
$var=array('nidn','nm_dosen','alt','jekel');
$val=array($_POST["nidn"],$_POST["nm"],$_POST["alt"],$_POST["jekel"]);
$dsn->setvar($var,$val);
$sql_simpan_dosen=$dsn->save_data();
$usr=new user_control();
$usr->setTableName("user");
$id_user=0;
$sql_cek=$usr->select_all("id");
if(mysqli_num_rows($sql_cek)>0){
	while($isi=mysqli_fetch_assoc($sql_cek)){
		$id_user=$isi["id"];
	}
}
$id_user=$id_user+1;
$var_user=array('id','nm_user','pass','type');
$val_user=array($id_user,$_POST["nidn"],$_POST["nidn"]."xxx","dosen");
$usr->setvar($var_user,$val_user);
$sql_simpan_user=$usr->save_data();
if(!$sql_simpan_user){
	echo mysqli_error($usr->con);
}
if(($_FILES["foto"]["name"]!='')&&($_FILES["foto"]["size"]!='0')){
$name_file=$_FILES["foto"]["name"];
$fl=$_FILES["foto"]["tmp_name"];
move_uploaded_file($fl, "image/".$_POST["nidn"].".jpg");
}

echo "<script>window.location.href='index.php?p=dosen';</script>";
?>