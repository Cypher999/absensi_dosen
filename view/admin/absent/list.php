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
<h1>Daftar Permintaan Absen</h1>
<br>
	<table class="table table-bordered table-striped">
		<tr><th>NIDN</th><th>Nama Dosen</th><th>Waktu Absen</th><th>Absen</th><th>Keterangan</th><th>Control</th></tr>
<?php
if(mysqli_num_rows($sql)<=0):
?>
	<tr><td colspan="6">data kosong</td></tr>
<?php else:
	while($isi=mysqli_fetch_assoc($sql)):
		if($isi["status"]=="P"):?>
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
			<td><input type="button" class="btn btn-primary" onclick="window.location.href='process.php?p=absen&&b=acc&&id_data=<?php echo $isi["id_data"];?>'" value="Terima Absen">
				<input type="button" class="btn btn-warning" onclick="window.location.href='process.php?p=absen&&b=dec&&id_data=<?php echo $isi["id_data"];?>'" value="Tolak Absen"></td>
		</tr>
<?php endif;endwhile;endif;?>
</table>
</div>