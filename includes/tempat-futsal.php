<h4>Daftar Tempat Futsal</h4>
<div class="col-lg-8" style="margin: 0 auto;float: none;">

<div class="row">
<?php 
$q = mysqli_query($conn,"select * from owner_futsal where status_aktif='1'");

while($d = mysqli_fetch_object($q)){
 ?>
	<div class="col-lg-6" >
		<img src="<?php echo "uploads/".$d->foto_futsal; ?>" class="img img-thumbnail">
		<center>
			<?php echo $d->nama_futsal; ?> <br>

							<a href="index.php?p=lapangan&id=<?php echo $d->id_owner; ?>"><button class="btn btn-success">Detail</button></a>

		</center>

	</div>
<?php } ?>
</div>	

</div>