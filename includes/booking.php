<?php 
if (empty($_SESSION['type'])) {
	$_SESSION['info'] = "Untuk Memesan Silahkan Login/Register lebih dahulu";
	header("location: index.php?p=login");
}
$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * from data_lapangan LEFT JOIN owner_futsal ON data_lapangan.id_owner = owner_futsal.id_owner where id_lapangan ='$id'");

$fetch= mysqli_fetch_object($query);
 ?>

<div class="row">
	<div class="col-lg-6" >
	<?php if (isset($_SESSION['info'])): ?>
	<?php echo $_SESSION['info']; ?>
<?php unset($_SESSION['info']); endif; ?>

	<form action="system/booking.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
	<label>Tempat Futsal</label>
		<input type="text"  class="form-control" readonly value="<?php echo $fetch->nama_futsal; ?>">
	<label>Lapangan</label>
		<input type="text" disabled name="username" class="form-control" required value="<?php echo $fetch->nama_lapangan; ?>">
	
		<label>Tanggal Main</label>
		<input type="date" name="date" class="form-control" required >

		<label>Jam Bermain</label>
		<input type="text" name="awal" class="form-control time"  >			
	<!-- 	<label>Jam Akhir</label>
		<input type="time" name="akhir" class="form-control"  >			 -->

<center>
	<button type="submit" class="btn btn-success" style="margin: 5px;">Pesan</button>	
</center>	</form>
	</div>


</div>	

<script type="text/javascript">
	$(document).ready(function(){
    $('.time').timepicker({
    	timeFormat: 'HH:mm',
    	scrollbar:true
    });
});
</script>