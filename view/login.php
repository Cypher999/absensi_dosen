<br><br><br><br><br><div class="container col-md-4 border border-1 bg-secondary p-5">
<h2 align="middle">Selamat datang di Absensi Dosen</h2>
<form class="needs-validation" novalidate="" method="post" action="process.php?p=user&&b=login" enctype="multipart/form-data">
	<div class="form-row">
		<label for="username">Username</label>
		<input type="text" class="form-control" id="username" name="username" required>
		<div class="valid-feedback">Ok !</div>
	</div>
	<div class="form-row">
		<label for="pass">Password</label>
		<input type="password" class="form-control" id="pass" name="pass" required>
		<div class="valid-feedback">Ok !</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col">
			<input type="submit" name="login" value="Masuk" class="btn btn-warning">
		</div>
	</div>
</form>
</div>