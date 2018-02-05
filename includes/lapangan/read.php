<?php if (empty($_SESSION['type']) || $_SESSION['type']=='Member'): ?>
	<?php 
$get = addslashes($_GET['id']);
$queryInfo = mysqli_query($conn,"SELECT * from owner_futsal where id_owner = '$get'");
$fetch = mysqli_fetch_object($queryInfo);

 ?>

<div class="panel panel-default col-lg-12">
<table class="table table-striped">
	<tr>
		<td>Nama Tempat Futsal</td><td><?php echo $fetch->nama_futsal; ?></td>
	</tr>
	<tr>
		<td>No Telepon</td><td><?php echo $fetch->telp; ?></td>
	</tr>
	<tr>
		<td>Alamat</td><td><?php echo $fetch->alamat_futsal; ?></td>
	</tr>
	<tr>
		<td>Fasilitas</td><td><?php echo $fetch->fasilitas; ?></
	</tr>
	<tr>

		<td>Info Lainnya</td><td><?php echo $fetch->info_futsal; ?></td>
	</tr>
</table>
</div>
<?php endif ?>

<h4>Daftar Lapangan </h4>
			 <?php if (@$_SESSION['type']== 'owner') { ?>
<div class="pull-right">
	<a href="index.php?p=lapangan&act=tambah">
	<button class="btn btn-primary">Tambah</button>
</a>
</div>
<?php } ?>
<?php if (isset($_SESSION['info'])): ?>
	<?php echo $_SESSION['info']; ?>
<?php unset($_SESSION['info']); endif; ?>
<div class="col-lg-8" style="margin: 0 auto;float: none;">

<div class="row">

<?php
if (@$_SESSION['type']== 'owner') {
$id = $_SESSION['id_user'];
}
if (empty($_SESSION['type']) || $_SESSION['type'] == 'member') {
$id = @$_GET['id'];
}
$q = mysqli_query($conn,"select * from data_lapangan where id_owner = '$id'");

while($d = mysqli_fetch_object($q)){ ?>
	<div class="col-lg-6" >
		<img src="<?php echo "uploads/".$d->foto_lapangan; ?>" class="img img-thumbnail">
		<center>
			<?php echo $d->nama_lapangan ?> <br>
			<?php echo $d->ket_lapangan; ?> <br>
			<?php echo $d->info_harga."/Jam"; ?>
			 <br>
			 <?php if (@$_SESSION['type']== 'owner') { ?>
							<a href="index.php?p=register&c=owner"><button class="btn btn-danger">Hapus</button></a>
							<a href="index.php?p=lapangan&act=edit&id=<?php echo $d->id_lapangan; ?>"><button class="btn btn-success">Edit</button></a>
			<?php } ?>
			<?php if (empty($_SESSION['type']) || $_SESSION['type'] == 'member') {
				?>
				<a href="index.php?p=booking&id=<?php echo $d->id_lapangan; ?>"><button class="btn btn-primary">Booking Sekarang</button></a>
				<?php
					}

 ?>


		</center>

	</div>
	<?php } ?>
</div>	

</div>