<div class='col-md-8'>
	<h2>Ubah Password User</h2>
<form action="process.php?p=user&&b=ch_pas" method="post" enctype="multipart/form-data">
	<label>Password lama</label>
	<input type="password" class="form-control" name="lama">
	<label>Password baru</label>
	<input type="password" class="form-control" name="baru">
	<label>konfirmasi password baru</label>
	<input type="password" class="form-control" name="konf"><br>
	<input class="btn btn-primary" type="submit" value="ubah password"><br>
	<input type="button" class="btn btn-warning" value="&#9664;&#9664;&#9664;" title="kembali" onclick="window.location.href='index.php';">
</form>
</div>