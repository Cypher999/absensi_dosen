<?php
$no=1;
require_once 'control/dosen/main.php';
require_once 'control/absent/main.php';
require_once 'control/month.php';
$cek_nidn=array();
$ada=0;
$dsn=new dosen();
$dsn->setTableName("dosen");
$abs=new absen();
$abs->setTableName("absen");
$sql_abs=$abs->select_all("nidn");
?>
<h2 align="center">Laporan Absen Harian</h2>
<h5 align="center">Tanggal <?php echo $_POST["tgl"]." ".month_count($_POST["bln"])." ".$_POST["thn"];?> </h5>
<table border="2" style="width:70%" align="center">
	<tr><th rowspan="2">No</th>
		<th rowspan="2">Nidn</th>
		<th rowspan="2">Nama Dosen</th>
		<th rowspan="2">Masuk</th>
		<th rowspan="2">Keluar</th>
		<th colspan="2">Absen Lainnya</th>
		<th rowspan="2">Keterangan</th>
	</tr>
	<tr>
		<th>Sakit</th>
		<th>Izin</th>
	</tr>
<?php while($isi_abs=mysqli_fetch_assoc($sql_abs)):
	$wkt_all=$_POST["thn"]."-".$_POST["bln"]."-".$_POST["tgl"];
	$wkt=date_create($isi_abs["tgl"]);
	$tgl=date_format($wkt,"d");
	$bln=date_format($wkt,"m");
	$thn=date_format($wkt,"Y");
	if(($tgl==$_POST["tgl"])&&($bln==$_POST["bln"])&&($thn==$_POST["thn"])&&($isi_abs["status"]=="A")):
		if(count($cek_nidn)>0){
		for($i=0;$i<count($cek_nidn);$i++){
			if($cek_nidn[$i]==$isi_abs["nidn"]){
				$ada=1;
			}
			else{
				$ada=0;
			}
		}
	}
	if($ada==0):
		array_push($cek_nidn, $isi_abs["nidn"]);
	?>
	<tr><td><?php echo $no;?></td>
		<td><?php echo $isi_abs["nidn"];?></td>
		<td><?php 
		$sql_dsn=$dsn->search_data("nidn",$isi_abs["nidn"]);
		$isi_dsn=mysqli_fetch_assoc($sql_dsn);
		echo $isi_dsn["nm_dosen"];?></td>
		<td><?php
		$sql_abs_ms=$abs->search_data("nidn",$isi_abs["nidn"],"absen","d","tgl",$wkt_all);
		$isi_abs_ms=mysqli_fetch_assoc($sql_abs_ms);
		 echo $isi_abs_ms["jam"];?></td>
		 <td><?php
		$sql_abs_kl=$abs->search_data("nidn",$isi_abs["nidn"],"absen","p","tgl",$wkt_all);
		$isi_abs_kl=mysqli_fetch_assoc($sql_abs_kl);
		 echo $isi_abs_kl["jam"];?></td>
		 <td><?php
		$sql_abs_sk=$abs->search_data("nidn",$isi_abs["nidn"],"absen","s","tgl",$wkt_all);;
		 if(mysqli_num_rows($sql_abs_sk)>0){
		 	echo "V";
		 }?></td>
		 <td><?php
		$sql_abs_iz=$abs->search_data("nidn",$isi_abs["nidn"],"absen","i","tgl",$wkt_all);
		 if(mysqli_num_rows($sql_abs_iz)>0){
		 	echo "V";
		 }?></td>
		 <td><?php
		 if((mysqli_num_rows($sql_abs_sk)>0)||(mysqli_num_rows($sql_abs_iz)>0)){
		 	echo $isi_abs["ket"];
		 }
		 $no=$no+1;
		 ?></td>
		</tr>
		<?php $ada=0; endif;endif;endwhile;?>
</table>
<script>window.print()</script>