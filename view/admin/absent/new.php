<div class="col-md-8">
	<h1>Entry Data Dosen</h1>
<form action="process.php?p=dosen&&b=save" method="post" enctype="multipart/form-data">
<label>Nidn</label>
<input type="text" class="form-control" name="nidn" placeholder="nidn">
<label>Nama</label>
<input type="text" class="form-control" name="nm" placeholder="nama">
<label>Alamat</label>
<input type="text" class="form-control" name="alt" placeholder="alamat">
<label>Jenis Kelamin</label><br>
<input type="radio"  name="jekel" value="L">Laki-laki
<input type="radio"  name="jekel" value="P">Perempuan<br>
<label>Foto</label><br>
<img width="150" height="150" src="image/empty.jpeg" id="foto_dosen"><br>
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