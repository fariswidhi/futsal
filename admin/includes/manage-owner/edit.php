<?php
$id = $_GET['id'];
$query = mysqli_query($conn,"select * from owner_futsal where id_owner = ".$id);
$num = mysqli_num_rows($query);
if (empty($id) || $num ==0) {
header("Location: index.php?p=manage-owner"); /* Redirect browser */

exit();
}

$obj = mysqli_fetch_object($query);
?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Owner 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Edit Owner
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
<div class="row">
	<div class="col-lg-6" >
	<form action="../system/update-profile.php?id=<?= $id; ?>&s=owner" method="post" enctype="multipart/form-data">
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
	<button type="submit" class="btn btn-success" style="margin: 5px;">Ubah</button>	
</center>	</form>
	</div>


</div>	
</div>
</div>