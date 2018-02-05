<?php if ($_SESSION['type']=='owner'): ?>
	

<div class="row">
	<div class="col-lg-6" >
	<form action="system/update-profile.php" method="post" enctype="multipart/form-data">
	<label>Nama Lengkap</label>
		<input type="text" name="fullname" class="form-control" required value="<?php echo $obj->nama_owner; ?>">
	<label>Username</label>
		<input type="text" disabled name="username" class="form-control" required value="<?php echo $obj->username_owner; ?>">
	<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Masukan Password Jika Mau Mengganti">
	<label>Telepon</label>
		<input type="text" name="phone" class="form-control" required value="<?php echo $obj->telp; ?>">

		<label>Nama Tempat Futsal</label>
		<input type="text" name="futsalname" class="form-control" required value="<?php echo $obj->nama_futsal; ?>">			
		<label>Fasilitas</label>
		<textarea class="form-control" required name="facility"><?php echo $obj->fasilitas; ?></textarea>
		<label>Info</label>
		<textarea class="form-control" required name="info"><?php echo $obj->info_futsal; ?></textarea>
		<label>Foto Tempat Futsal</label>
		<input type="file" name="foto" class="form-control" >			

	<label>Alamat</label>
	<textarea class="form-control" required name="address"><?php echo $obj->alamat_futsal; ?></textarea>
<center>
	<button type="submit" class="btn btn-success" style="margin: 5px;">Daftar</button>	
</center>	</form>
	</div>


</div>	
<?php else: ?>

<div class="row">
	<div class="col-lg-6" >
	<form action="system/update-profile.php" method="post" enctype="multipart/form-data">
	<label>Nama Lengkap</label>
		<input type="text" name="fullname" class="form-control" required value="<?php echo $obj->nama_member; ?>">
	<label>Username</label>
		<input type="text" disabled name="username" class="form-control" required value="<?php echo $obj->username_member; ?>">
	<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Masukan Password Jika Mau Mengganti">
	<label>Telepon</label>
		<input type="text" name="phone" class="form-control" required value="<?php echo $obj->telephone_member; ?>">

		<label>Email</label>
		<input type="email" name="email" class="form-control" required value="<?php echo $obj->email_member; ?>">			
	<label>Alamat</label>
	<textarea class="form-control" required name="address"><?php echo $obj->alamat_member; ?></textarea>
<center>
	<button type="submit" class="btn btn-success" style="margin: 5px;">Daftar</button>	
</center>	</form>
	</div>




</div>	

<?php endif ?>