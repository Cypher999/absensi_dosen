<?php
require_once 'control/absent/main.php';
require_once 'control/user/main.php';
$mod_m=new user_control();
$mod_m->setTableName("user");
$sql=$mod_m->search_data("id",$_SESSION["id_user_absen"],"","");
$isi=mysqli_fetch_assoc($sql);
$nama_user=$isi["nm_user"];
$tipe=$isi["type"];

$abs=new absen();
$abs->setTableName("absen");
$sql=$abs->search_data("nidn",$nama_user,"","","","");
?>
<div class="col-md-8">
	<h2>Data Absen Saya</h2>
	<table class="table table-bordered table-striped">
		<tr>
			<th>Tanggal</th>
			<th>Jam</th>
			<th>Absen</th>
			<th>Keterangan</th>
			<th>Status</th>
		</tr>
		<?php while($isi=mysqli_fetch_assoc($sql)):?>
		<tr>
			<td><?php echo $isi["tgl"];?></td>
			<td><?php echo $isi["jam"];?></td>
			<td><?php if($isi["absen"]=="d"){
				echo "datang";
			}
			else if($isi["absen"]=="p"){
				echo "pulang";
			}
			else if($isi["absen"]=="i"){
				echo "izin";
			}
			else if($isi["absen"]=="s"){
				echo "sakit";
			}?></td>
			<td><?php echo $isi["ket"];?></td>
			<td><?php if($isi["status"]=="P"){
					echo "Menunggu Persetujuan";
				}
				else if($isi["status"]=="A"){
					echo "Diterima";
				}
				else if($isi["status"]=="D"){
					echo "Ditolak";
				}
				?></td>
		</tr>

		<?php endwhile;?>
	</table>
</div>