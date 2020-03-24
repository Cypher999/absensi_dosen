<h2>Form Pengajuan Absen</h2>
<div class="col-md-4">
<form action="process.php?p=give_absent&&b=new" method="post" enctype="multipart/form-data">
<label>Jam</label>
<input type="text" class="form-control" readonly="" value="<?php echo date('H:i');?>">
<label>Tanggal</label>
<input type="text" class="form-control" readonly="" value="<?php echo date('Y/m/d');?>">
<label>Status</label>
<select name="status" class="form-control">
<option value="d">Datang</option>
<option value="p">Pulang</option>
<option value="i">Izin</option>
<option value="s">Sakit</option>
</select>
<label>Keterangan</label>
<textarea class="form-control" name="ket" cols="30" rows=5></textarea>
<br>
<div class="row">
	<div class="col"><input type="submit" name="save" class="btn btn-primary" value="simpan absen"></div>
	<div class="col"><input type="button" name="back" onclick="window.location.href='index.php';" class="btn btn-danger" value="kembali"></div>
</div>
</form>
</div>