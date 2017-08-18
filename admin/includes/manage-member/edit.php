<?php 
$id = $_GET['id'];
$query = mysqli_query($conn,"select * from member where id_member = ".$id);
$obj = mysqli_fetch_object($query);
$num = mysqli_num_rows($query);
if (empty($id) || $num ==0) {
header("Location: index.php?p=manage-member"); /* Redirect browser */

exit();
}

 ?>
  <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Member 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Edit Member
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
<div class="row">
	<div class="col-lg-6" >
	<form action="../system/update-profile.php?id=<?=$id."&s=member"; ?>" method="post" enctype="multipart/form-data">
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
	<button type="submit" class="btn btn-success" style="margin: 5px;">Ubah</button>	
</center>	</form>
	</div>




</div>	
</div>
</div>