<?php 
$sessid = $_SESSION['id_user'];
$get = $_GET['act'];

if ($get == 'jadwal') {
	$type = 1;
}
elseif ($get == 'booking') {
	$type= 0;
}
else{
	header("location: index.php");
}
?>

<?php if (isset($_SESSION['info'])): ?>
	<?php echo $_SESSION['info']; ?>
<?php unset($_SESSION['info']); endif; ?>

<?php
if ($_SESSION['type'] == 'owner') {
$q = mysqli_query($conn,"SELECT * FROM `jadwal` LEFT JOIN owner_futsal ON jadwal.id_owner = owner_futsal.id_owner LEFT JOIN data_lapangan ON data_lapangan.id_owner = owner_futsal.id_owner LEFT JOIN member ON jadwal.id_member = member.id_member where jadwal.status ='".$type."' and jadwal.id_owner='$sessid' group by jadwal.id_jadwal");
?>

<table class="table table-hover">
	<thead>
		<th>#</th>
		<th>Tanggal Pesan</th>
		<th>Tanggal Pakai</th>
		<th>Jam Main</th>
		<th>Jam Selesai</th>
		<th>Lapangan</th>	
		<th>Nama Pemesan</th>
		<th>Aksi</th>
	</thead>
	<tbody>
<?php $no=1; while($d =mysqli_fetch_object($q)){ ?>
		<tr>
			<td><?php echo $no++; ?></td>

			<td><?php echo $d->tgl_pesan; ?></td>
			
			<td><?php echo $d->tgl_main; ?></td>
			<td><?php echo $d->jam_awal; ?></td>
			<td><?php echo $d->jam_akhir; ?></td>			
			<td><?php echo $d->nama_lapangan; ?></td>
						<td><?php echo $d->nama_member; ?></td>

			<td>
			<a href="system/confirm.php?id=<?php echo $d->id_jadwal; ?>">
			<button class="btn btn-success">Konfirmasi</button>
			</a>
			<a href="system/cancel.php?id=<?php echo $d->id_jadwal; ?>">
			<button class="btn btn-danger">Hapus</button>
			</a>
			</td>
			
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php




}
elseif($_SESSION['type'] =='member'){
$q = mysqli_query($conn,"SELECT * FROM `jadwal` LEFT JOIN owner_futsal ON jadwal.id_owner = owner_futsal.id_owner LEFT JOIN data_lapangan ON data_lapangan.id_owner = owner_futsal.id_owner where jadwal.status ='".$type."' and jadwal.id_member='$sessid' group by jadwal.id_jadwal");

?>


<table class="table table-hover">
	<thead>
		<th>#</th>
		<th>Tanggal Pesan</th>
		<th>Tanggal Pakai</th>
		<th>Nama Tempat</th>
		<th>Lapangan</th>	
		<th>Jam Main</th>
		<th>Jam Selesai</th>
		<th>Aksi</th>
	</thead>
	<tbody>
<?php $no=1; while($d =mysqli_fetch_object($q)){ ?>
		<tr>
			<td><?php echo $no++; ?></td>

			<td><?php echo $d->tgl_pesan; ?></td>
			
			<td><?php echo $d->tgl_main; ?></td>
			
			<td><?php echo $d->nama_futsal; ?></td>
			<td><?php echo $d->nama_lapangan; ?></td>
			<td><?php echo $d->jam_awal; ?></td>
			<td><?php echo $d->jam_akhir; ?></td>
			<td>
			<a href="system/cancel.php?id=<?php echo $d->id_jadwal; ?>">
			<button class="btn btn-danger">Batal</button>
			</a>
			</td>
			
		</tr>
		<?php } ?>
	</tbody>
</table>







<?php
}

 ?>


