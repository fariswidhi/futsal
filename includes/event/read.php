<?php if (@$_SESSION['type']=='owner'): ?>
	<div class="pull-right">
	<a href="index.php?p=event&act=add">
		<button class="btn btn-primary">Tambah</button>
	</a>
</div>
<?php if (isset($_SESSION['info'])): ?>
	<?php echo $_SESSION['info']; ?>
<?php unset($_SESSION['info']); endif; ?>
<table class="table table-hover">
	<thead>
		<th>#</th>
		<th>Judul</th>
		<th>Aksi</th>
	</thead>
	<?php 
	$id = $_SESSION['id_user'];
	$query = mysqli_query($conn,"select * from agenda where id_owner = '$id'");
	$no = 1;
	while ($d = mysqli_fetch_object($query)) {
?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><a href="index.php?p=event&act=detail&id=<?php echo $d->id; ?>"><?php echo $d->judul; ?></a></td>
		<td><a href="index.php?p=event&act=edit&id=<?php echo $d->id; ?>"><button class="btn btn-success"> Edit</button></a></td>
	</tr>
<?php		}
	 ?>

</table>
<?php else: ?>
<div class="container">
		<div class="row">
			<?php 

			$q = mysqli_query($conn,"select * from agenda left join owner_futsal on agenda.id_owner = owner_futsal.id_owner ");
			while ($d = mysqli_fetch_object($q)) {
				?>
				<a href="index.php?p=event&act=detail&id=<?php echo $d->id; ?>">
				<div class="col-lg-4" style="height: 300px;">
						<div class="panel panel-default">
						<?php if ($d->foto_agenda == "" || $d->foto_agenda == null || !file_exists("uploads/".$d->foto_agenda)): ?>
							<img src="assets/img/not-found.png" class="img img-thumbnail" style="height: 200px;width: 100%;">
							<?php else: ?>
							<img src="uploads/<?php echo $d->foto_agenda; ?>" class="img img-thumbnail" style="height: 200px;width: 100%;">

						<?php endif ?>
							<div style="padding: 5px;">
								<h3><?php echo $d->judul; ?></h3>
								<i class="fa fa-user"></i> <?php echo $d->nama_futsal; ?> <br>
									pada <?php echo $d->tanggal_posting; ?>

							</div>
						</div>
				</div>
				</a>
<?php							}
			?>

		</div>
</div>
<?php endif ?>
