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
                                <i class="fa fa-dashboard"></i> Info Member
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

<div class="col-lg-12" style="margin: 0 auto;float: none;">
<?php if (isset($_SESSION['info'])): ?>
	<?php echo $_SESSION['info']; ?>
<?php unset($_SESSION['info']); endif; ?>
<div class="row">
<div class="col-lg-5">
		<div class="panel panel-default">
				<table class="table table-striped">
	
						<tr>

						<td>Username</td><td><?php echo $obj->username_member; ?></td>
					</tr>
					<tr>
						<td>Nama</td><td><?php echo $obj->nama_member; ?></td>
					</tr>
					<tr>
						<td>Telepon</td><td><?php echo $obj->telephone_member; ?></td>
					</tr>
					<tr>
						<td>Alamat</td><td><?php echo $obj->alamat_member; ?></td>
					</tr>
					<tr>
						<td>Email</td><td><?php echo $obj->email_member; ?></td>
					</tr>
	
				</table>
				<center>
				<a href="index.php?p=manage-member&act=edit&id=<?php echo $obj->id_member; ?>">
					<button class="btn btn-primary">Ubah</button>
				</a>
				</center>
		</div>
</div>
</div>	

</div>
</div>
</div>
