<?php
require_once 'control/dosen/main.php';
require_once 'control/user/main.php';
$mod_m=new user_control();
$mod_m->setTableName("user");
$sql_m=$mod_m->search_data("id",$_SESSION["id_user_absen"],"","");
$isi_m=mysqli_fetch_assoc($sql_m);
$nama_user=$isi_m["nm_user"];
$dsn=new dosen();
$dsn->setTableName("dosen");
$sql=$dsn->search_data("nidn",$nama_user);
$isi=mysqli_fetch_assoc($sql);
?>
<div class="col-md-8">
	<h1>Edit Data</h1>
<form action="process.php?p=user&&b=edit" method="post" enctype="multipart/form-data">
<label>Nidn</label>
<input type="text" class="form-control" name="nidn" value="<?php echo $isi["nidn"];?>" readonly>
<label>Nama</label>
<input type="text" class="form-control" name="nm" value="<?php echo $isi["nm_dosen"];?>">
<label>Alamat</label>
<input type="text" class="form-control" name="alt" value="<?php echo $isi["alt"];?>">
<label>Jenis Kelamin</label><br>
<input type="radio"  name="jekel" <?php if ($isi["jekel"]=="L"){echo "checked";}?> value="L">Laki-laki
<input type="radio"  name="jekel" <?php if ($isi["jekel"]=="P"){echo "checked";}?> value="P">Perempuan<br>
<label>Foto</label><br>
<img width="150" height="150" src="image/<?php echo $isi["nidn"];?>.jpg" id="foto_dosen"><br>
<input type="file" name="foto" onchange="prev()"><br><br>
<div class="row">
	<div class="col">
		<input type="submit" class="button_save" title="simpan">
	</div>
	<div class="col">
		<input type="reset" class="button_reset" title="reset" onclick="document.getElementById('foto_dosen').src='image/empty.jpeg'">
	</div>
</div><br>
<div class="row">
	<div class="col">
		<input type="button" class="btn btn-warning" value="&#9664;&#9664;&#9664;" title="kembali" onclick="window.location.href='index.php?p=dosen';">
	</div>
	</div>
</form>
</div>
<script>
	function prev(){
		var gbr=document.getElementById('foto_dosen');
		gbr.src=URL.createObjectURL(event.target.files[0]);
	}
</script>