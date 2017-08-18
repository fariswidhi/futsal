<?php 
switch (@$_GET['act']) {
	case 'change':
	include('change.php');
		break;
	
	default:
?>
<h4>Profil</h4>
<div class="col-lg-12" style="margin: 0 auto;float: none;">
<?php if (isset($_SESSION['info'])): ?>
	<?php echo $_SESSION['info']; ?>
<?php unset($_SESSION['info']); endif; ?>
<div class="row">
<div class="col-lg-5">
		<div class="panel panel-default">
				<table class="table table-striped">
				<?php if ($_SESSION['type']=='owner'): ?>
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

				<?php else: ?>

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
				<?php endif ?>

				</table>
				<center>
				<a href="index.php?p=profil&act=change">
					<button class="btn btn-primary">Ubah</button>
				</a>
				</center>
		</div>
</div>
</div>	

</div>
<?php
		break;
}
 ?>