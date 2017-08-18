<?php if (empty($_GET['c'])): ?>
	

<h4>Pilih Pendaftaran</h4>
<div class="col-lg-8" style="margin: 0 auto;float: none;">

<div class="row">
	<div class="col-lg-6" >
		<img src="http://panditfootball.com/content/uploads/2015/04/Agung_Dwi_01.jpg" class="img img-thumbnail">
		<center>
			Owner Futsal <br>
			(Untuk Pemilik/Pengelola Tempat Futsal) <br>
							<a href="index.php?p=daftar&c=owner"><button class="btn btn-success">Daftar</button></a>

		</center>

	</div>
		<div class="col-lg-6">
		<img src="http://panditfootball.com/content/uploads/2015/04/Agung_Dwi_01.jpg" class="img img-thumbnail">
		<center>
			Member Futsal <br>
			(Untuk Umum/Penyewa) <br>
					<a href="index.php?p=daftar&c=member"><button class="btn btn-success">Daftar</button></a>

		</center>
	</div>
</div>	

</div>
<?php endif ?>




<?php if (@$_GET['c'] == "owner" || @$_GET['c'] == "member" ): ?>
	


<?php if ($_GET['c'] == "member"): ?>
	<h4> Pendaftaran Untuk Member/Penyewa Lapangan</h4>
<?php endif ?>
<?php if ($_GET['c'] == "owner"): ?>
	<h4> Pendaftaran Untuk Owner/Penyedia Lapangan</h4>
<?php
 endif ?>
 <?php if (isset($_SESSION['info'])): ?>

 	<?php echo $_SESSION['info']; ?>

 <?php unset($_SESSION['info']); endif  ?>
<!-- <div class="col-lg-8" style="margin: 0 auto;float: none;"> -->

<div class="row">
	<div class="col-lg-6" >
	<form action="system/register.php?s=<?php echo $_GET['c']; ?>" method="post" enctype="multipart/form-data">
	<label>Nama Lengkap</label>
		<input type="text" name="fullname" class="form-control" required>
	<label>Username</label>
		<input type="text" name="username" class="form-control" required>
	<label>Password</label>
		<input type="password" name="password" class="form-control" required>
	<label>Ulangi Password</label>r
		<input type="password" name="repassword" class="form-control" required>
	<label>Telepon</label>
		<input type="text" name="phone" class="form-control" required>
		<?php if ($_GET['c'] == 'member'): ?>
		<label>Email</label>
		<input type="email" name="email" class="form-control" required>			
		<?php endif ?>
		<?php if ($_GET['c']=='owner'): ?>
		<label>Nama Tempat Futsal</label>
		<input type="text" name="futsalname" class="form-control" required>			
		<label>Fasilitas</label>
		<textarea class="form-control" required name="facility"></textarea>
		<label>Info</label>
		<textarea class="form-control" required name="info"></textarea>
		<label>Foto Tempat Futsal</label>
		<input type="file" name="foto" class="form-control" >			

		<?php endif ?>
	<label>Alamat</label>
	<textarea class="form-control" required name="address"></textarea>
<center>
	<button class="btn btn-success" style="margin: 5px;">Daftar</button>	
</center>	</form>
	</div>


</div>	

<!-- </div> -->
<?php endif ?>
