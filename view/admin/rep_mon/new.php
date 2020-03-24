<div class="col-md-5">
	<h1>Cetak Laporan Bulanan</h1>
<?php require_once 'control/month.php';?>
<form action="process.php?p=rep_mon" method="post" enctype="multipart/form-data">
<label>Bulan</label>
<select class="form-control" name="bln">
<?php
for($i=1;$i<=12;$i++){
	echo "<option value='".$i."'>".month_count($i)."</option>";
}
?>
</select>
<label>Tahun</label>
<select class="form-control" name="thn">
<?php
for($j=1990;$j<=2100;$j++){
	echo "<option value='".$j."'>".$j."</option>";
}
?>
</select><br><br>
<div class="row">
	<div class="col">
		<input type="submit" class="button_print" title="cetak">
	</div>
	<div class="col">
		<input type="button" class="btn btn-warning" value="&#9664;&#9664;&#9664;" title="kembali" onclick="window.location.href='index.php';">
	</div>
</div>
</form>
</div>
