<?php 
$id = $_GET['id'];
$q = mysqli_query($conn,"select * from agenda where id='$id'");
$f = mysqli_fetch_object($q);
 ?>
<div class="row">
	<div class="col-lg-8" >
	<form action="system/update-article.php?id=<?php echo $f->id; ?>" method="post" enctype="multipart/form-data">
	<label>Judul</label>
		<input type="text" name="title" class="form-control" required value="<?php echo $f->judul; ?>">
	<label>Tanggal Kegiatan</label>
		<input type="date"  name="date" class="form-control" required value="<?php echo $f->tanggal_kegiatan; ?>">
	<label>Foto</label>
	<img src="<?php echo "uploads/".$f->foto_agenda; ?>" class="img img-thumbnail">
		<input type="file" name="photo" class="form-control" >

	<label>Isi</label>
	<textarea class="form-control" required name="desc"><?php echo $f->isiagenda; ?></textarea>
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