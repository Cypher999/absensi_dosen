<?php session_start();
date_default_timezone_set("Asia/Bangkok");
date_default_timezone_get();
?>
<?php require 'control/user/main.php';
if(isset($_SESSION["id_user_absen"])){
$mod_m=new user_control();
$mod_m->setTableName("user");
$sql=$mod_m->search_data("id",$_SESSION["id_user_absen"],"","");
$isi=mysqli_fetch_assoc($sql);
$nama_user=$isi["nm_user"];
$tipe=$isi["type"];
}
?>
<!DOCTYPE html>
<html>
<head><title>Absensi Dosen</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/dropdown_menu.css" type="text/css">
    <link rel="stylesheet" href="assets/css/set_image.css" type="text/css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
	<?php if(isset($_SESSION["id_user_absen"])){
		echo "<div id=\"main_content\" style=\"position:relative\">
		<div style=\"background-color:black;color:white;width:100%;position:fixed;z-index:1000\">
			<span style=\"font-size:30px;cursor:pointer;\" onclick=\"openNav()\">&#9776; Menu</span>
		</div><br><br><br>";
		if($tipe=="dosen"){
			require_once 'view/menu_user.php';
			if((isset($_GET["p"]))&&($_GET["p"]=="give_absent")){
				require_once 'view/give_absent/new.php';	
			}	
			else if((isset($_GET["p"]))&&($_GET["p"]=="my_absent")){
				require_once 'view/give_absent/list.php';	
			}

			else if((isset($_GET["p"]))&&($_GET["p"]=="my_absent")){
				require_once 'view/give_absent/list.php';	
			}
			else if((isset($_GET["p"]))&&($_GET["p"]=="edit_pass")){
				require_once 'view/user/edit_pass.php';	
			}
			else if((isset($_GET["p"]))&&($_GET["p"]=="edit")){
				require_once 'view/user/edit.php';	
			}
		}
		else if($tipe=="admin"){
			require_once 'view/menu.php';
			if((isset($_GET["p"]))&&($_GET["p"]=="dosen")&&(empty($_GET["b"]))){
				require_once 'view/admin/dosen/list.php';		
			}
			else if((isset($_GET["p"]))&&($_GET["p"]=="dosen")&&($_GET["b"]=="new")){
				require_once 'view/admin/dosen/new.php';		
			}
			else if((isset($_GET["p"]))&&($_GET["p"]=="dosen")&&($_GET["b"]=="edit")){
				require_once 'view/admin/dosen/edit.php';		
			}
			else if((isset($_GET["p"]))&&($_GET["p"]=="absent")&&(empty($_GET["b"]))){
				require_once 'view/admin/absent/list.php';		
			}
			else if((isset($_GET["p"]))&&($_GET["p"]=="absent_all")&&(empty($_GET["b"]))){
				require_once 'view/admin/absent/list_all.php';		
			}
			else if((isset($_GET["p"]))&&($_GET["p"]=="rep_mon")&&(empty($_GET["b"]))){
				require_once 'view/admin/rep_mon/new.php';		
			}
			else if((isset($_GET["p"]))&&($_GET["p"]=="rep_day")&&(empty($_GET["b"]))){
				require_once 'view/admin/rep_day/new.php';		
			}
			else if((isset($_GET["p"]))&&($_GET["p"]=="edit_pass")){
				require_once 'view/user/edit_pass.php';	
			}
		}
		if(empty($_GET["p"])){
		 require_once 'view/home.php';
		}
		echo "</div>";
	}
	else{
		require_once 'view/login.php';
	}

	?>
<script src="assets/js/dropdown_menu.js"></script>
</body>
</html>