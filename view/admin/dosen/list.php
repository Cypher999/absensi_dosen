<?php
require_once 'control/dosen/main.php';
$dsn=new dosen();
$dsn->setTableName("dosen");
$sql=$dsn->select_all("nidn");
?>
<div class="col-md-8">
<input type="button" class="button_add" title="tambah data" onclick="window.location.href='index.php?p=dosen&&b=new'"><br>
	<table class="table table-bordered table-striped">
		<tr><th>NIDN</th><th>Nama Dosen</th><th>Alamat Dosen</th><th>Jenis Kelamin</th><th>Foto</th><th>Control</th></tr>
<?php
if(mysqli_num_rows($sql)<0):
?>
	<tr><td colspan="6">data kosong</td></tr>
<?php else:
	while($isi=mysqli_fetch_assoc($sql)):?>
		<tr><td><?php echo $isi["nidn"];?></td>
			<td><?php echo $isi["nm_dosen"];?></td>
			<td><?php echo $isi["alt"];?></td>
			<td><?php if($isi["jekel"]=="L"){
					echo "laki-laki";
				}
				else if($isi["jekel"]=="P"){
					echo "Perempuan";
				}?></td>
				
			<td><img width="160" height="160" src="image/<?php echo $isi["nidn"];?>.jpg"></td>
			<td><input type="button" class="button_edit" onclick="window.location.href='index.php?p=dosen&&b=edit&&nidn=<?php echo $isi["nidn"];?>'" title="edit data">
				<input type="button" class="button_del" onclick="window.location.href='process.php?p=dosen&&b=del&&nidn=<?php echo $isi["nidn"];?>'" title="hapus data"></td>
		</tr>
<?php endwhile;endif;?>
</table>
</div>