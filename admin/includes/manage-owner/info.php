<?php 
$id = $_GET['id'];
$query = mysqli_query($conn,"select * from owner_futsal where id_owner = ".$id);
$obj = mysqli_fetch_object($query);

$num = mysqli_num_rows($query);
if (empty($id) || $num ==0) {
header("Location: index.php?p=manage-owner"); /* Redirect browser */

exit();
}

 ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Owner 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Detail Owner
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

<h4>Profil</h4>
<div class="col-lg-12" style="margin: 0 auto;float: none;">
<?php if (isset($_SESSION['info'])): ?>
	<?php echo $_SESSION['info']; ?>
<?php unset($_SESSION['info']); endif; ?>
<div class="row">
<div class="col-lg-5">
		<div class="panel panel-default">
				<table class="table table-striped">
										<tr>

						<td>Username</td><td><?php echo $obj->username_owner; ?></td>
					</tr>
					<tr>
						<td>Nama Pemilik</td><td><?php echo $obj->nama_owner; ?></td>
					</tr>
					<tr>
						<td>Nama Tempat Futsal</td><td><?php echo $obj->nama_futsal; ?></td>
					</tr>
					<tr>
						<td>Alamat</td><td><?php echo $obj->telp; ?></td>
					</tr>
					<tr>
						<td>Fasilitas</td><td><?php echo $obj->fasilitas; ?></td>
					</tr>
					<tr>
						<td>Info</td><td><?php echo $obj->info_futsal; ?></td>
					</tr>
					<tr>
						<td>Foto</td>
					</tr>


				</table>


		</div>
</div>
</div>	

</div>
</div>
</div>