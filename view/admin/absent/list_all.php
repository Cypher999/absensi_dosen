<?php
require_once 'control/absent/main.php';
require_once 'control/dosen/main.php';
$abs=new absen();
$abs->setTableName("absen");
$dsn=new dosen();
$dsn->setTableName("dosen");
$sql=$abs->select_all("id_data");
?>
<div class="col-md-8">
<h1>Daftar Absen</h1>
<br>
	<table class="table table-bordered table-striped">
		<tr><th>NIDN</th><th>Nama Dosen</th><th>Waktu Absen</th><th>Absen</th><th>Keterangan</th><th>Status</th></tr>
<?php
if(mysqli_num_rows($sql)<=0):
?>
	<tr><td colspan="6">data kosong</td></tr>
<?php else:
	while($isi=mysqli_fetch_assoc($sql)):?>
		<tr><td><?php echo $isi["nidn"];?></td>
			<td><?php
			$sql_dosen=$dsn->search_data("nidn",$isi["nidn"]);
			$isi_dosen=mysqli_fetch_assoc($sql_dosen);
			 echo $isi_dosen["nm_dosen"];?></td>
			<td><?php echo $isi["tgl"]."  ".$isi["jam"];?></td>
			<td><?php  if($isi["absen"]=="d"){echo "Datang";}
						else if($isi["absen"]=="s"){echo "Sakit";}
						else if($isi["absen"]=="i"){echo "Izin";}
						else if($isi["absen"]=="p"){echo "Pulang";}?></td>
			<td><?php echo $isi["ket"];?></td>			
			<td><?php if($isi["status"]=="P"){echo "Menunggu Persetujuan";}
			else if($isi["status"]=="A"){echo "Diterima";}
			else if($isi["status"]=="D"){echo "Ditolak";}?></td>
		</tr>
<?php endwhile;endif;?>
</table>
</div>