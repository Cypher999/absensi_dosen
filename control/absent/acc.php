<?php
session_start();
require_once 'control/absent/main.php';
$us=new absen();
$us->setTableName("absen");
$var=array("id_data","status");
$val=array($_GET["id_data"],"A");
$us->setvar($var,$val);
$sql_simpan=$us->edit_data();
if($sql_simpan){
		echo "<script>window.location.href='index.php?p=absent';</script>";
}
else{
	echo mysqli_error($us->con);
}
?>