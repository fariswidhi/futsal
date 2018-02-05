<?php 
$sessid = $_SESSION['id_user'];
?>

<?php if (isset($_SESSION['info'])): ?>
	<?php echo $_SESSION['info']; ?>
<?php unset($_SESSION['info']); endif; ?>


<?php
$q = mysqli_query($conn,"SELECT * FROM `jadwal` LEFT JOIN owner_futsal ON jadwal.id_owner = owner_futsal.id_owner LEFT JOIN data_lapangan ON data_lapangan.id_owner = owner_futsal.id_owner LEFT JOIN member ON jadwal.id_member = member.id_member where jadwal.status ='1' and jadwal.id_owner='$sessid' group by jadwal.id_jadwal");
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
			<a href="system/cancel.php?id=<?php echo $d->id_jadwal; ?>">
			<button class="btn btn-danger">Hapus</button>
			</a>
			</td>
			
		</tr>
		<?php } ?>
	</tbody>
</table>



