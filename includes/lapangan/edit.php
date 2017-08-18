<?php 
$id = $_GET['id'];
$query = mysqli_query($conn,"select * from data_lapangan where id_lapangan='$id'");

$num = mysqli_num_rows($query);
if (empty($id) || $num ==0) {
header("Location: index.php?p=lapangan"); /* Redirect browser */

exit();
}
$f = mysqli_fetch_object($query);
 ?>
<div class="row">
	<div class="col-lg-8" >
	<form action="system/ubah-lapangan.php?id=<?php echo $f->id_lapangan; ?>" method="post" enctype="multipart/form-data">
	<label>Nama Lapangan</label>
		<input type="text" name="name" class="form-control" required value="<?php echo $f->nama_lapangan; ?>">
	<label>Foto Lapangan</label>
	<img src="<?php echo "uploads/".$f->foto_lapangan; ?>" class="img img-thumbnail">
		<input type="file"  name="foto" class="form-control"  ">
	<label>Ket Lapangan</label>
		<textarea class="form-control textarea" required name="info"><?php echo $f->ket_lapangan; ?></textarea>
	<label>Info Harga/Jam</label>
<!-- 	<textarea class="form-control textarea" name="harga"></textarea>
 -->
    <textarea class="textarea" name="harga" placeholder="Enter text ..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;"><?php echo $f->info_harga; ?></textarea>

<center>
	<button type="submit" class="btn btn-success" style="margin: 5px;">Ubah</button>	
</center>	</form>
	</div>



</div>	


<script type="text/javascript">

  $('textarea').wysihtml5({
    toolbar: {
      fa: true
    }
  });

</script>