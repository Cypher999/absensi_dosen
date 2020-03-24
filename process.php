<?php
date_default_timezone_set("Asia/Bangkok");
date_default_timezone_get();
if(isset($_GET["p"])){
	if(($_GET["p"]=="user")&&($_GET["b"]=="login")){
		require_once 'control/user/login.php';
	}
	else if(($_GET["p"]=="user")&&($_GET["b"]=="edit")){
		require_once 'control/user/edit.php';
	}
	else if(($_GET["p"]=="user")&&($_GET["b"]=="ch_pas")){
		require_once 'control/user/ch_pas.php';
	}
	else if (($_GET["p"]=="give_absent")&&($_GET["b"]=="new")){
		require_once 'control/absent/save.php';
	}
	else if (($_GET["p"]=="absen")&&($_GET["b"]=="acc")){
		require_once 'control/absent/acc.php';
	}
	else if (($_GET["p"]=="absen")&&($_GET["b"]=="dec")){
		require_once 'control/absent/dec.php';
	}
	else if (($_GET["p"]=="dosen")&&($_GET["b"]=="save")){
		require_once 'control/dosen/save.php';
	}
	else if (($_GET["p"]=="dosen")&&($_GET["b"]=="edit")){
		require_once 'control/dosen/edit.php';
	}
	else if (($_GET["p"]=="dosen")&&($_GET["b"]=="del")){
		require_once 'control/dosen/delete.php';
	}
	else if (($_GET["p"]=="rep_mon")&&(empty($_GET["b"]))){
		require_once 'control/absent/rep_mon.php';
	}
	else if (($_GET["p"]=="rep_day")&&(empty($_GET["b"]))){
		require_once 'control/absent/rep_day.php';
	}
	else if(($_GET["p"]=="logout")){
		require_once 'control/user/logout.php';
	}
}
?>