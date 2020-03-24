<?php
require_once 'control/dosen/main.php';
require_once 'control/absent/main.php';
require_once 'control/month.php';
$dsn=new dosen();
$dsn->setTableName("dosen");
$sql_dsn=$dsn->select_all("nidn");
$abs=new absen();
$abs->setTableName("absen");
?>
<h2 align="center">Data Absen Bulanan</h2>
<h4 align="center">Bulan : <?php echo month_count($_POST["bln"])." ".$_POST["thn"];?></h4>
<table border="2" align="center">
	<tr><th rowspan="2">Nama Dosen</th>
		<th colspan="31">Tanggal</th>
		<th  rowspan="2">Catatan</th>
	</tr>
	<tr><?php for($i=1;$i<=31;$i++){
		echo "<td>".$i."</td>";
	}?>
	</tr>
<?php
while($isi_dsn=mysqli_fetch_assoc($sql_dsn)):
	?>
	<tr><td><?php echo $isi_dsn["nm_dosen"];?></td>
		<?php for($j=1;$j<=31;$j++){
		$tgl=$_POST["thn"]."-".$_POST["bln"]."-".$j;
		$sql_abs_d=$abs->search_data("nidn",$isi_dsn["nidn"],"tgl",$tgl,"absen","d");
		$isi_abs_d=mysqli_fetch_assoc($sql_abs_d);
		$sql_abs_s=$abs->search_data("nidn",$isi_dsn["nidn"],"tgl",$tgl,"absen","s");
		$isi_abs_s=mysqli_fetch_assoc($sql_abs_s);
		$sql_abs_i=$abs->search_data("nidn",$isi_dsn["nidn"],"tgl",$tgl,"absen","i");
		$isi_abs_i=mysqli_fetch_assoc($sql_abs_i);
		if((mysqli_num_rows($sql_abs_d)>0)&&($isi_abs_d["status"]=="A")){
			echo "<td>H</td>";
		}
		else if((mysqli_num_rows($sql_abs_s)>0)&&($isi_abs_s["status"]=="A")){
			echo "<td>S</td>";
		}
		else if((mysqli_num_rows($sql_abs_i)>0)&&($isi_abs_i["status"]=="A")){
			echo "<td>I</td>";
		}
		else{
			echo "<td></td>";
		}
		}?>	
		<td style="height:40px;width:180px"></td></tr>
	<?php endwhile;?>
</table><br>
ket :<br>
<table><tr><td>H</td><td>:</td><td>Hadir</td></tr>
	<tr><td>I</td><td>:</td><td>Izin</td></tr>
	<tr><td>S</td><td>:</td><td>Sakit</td></tr>
	<tr><td>Kosong</td><td>:</td><td>Tidak datang / tanpa keterangan</td></tr>
</table>
<script>window.print();</script>