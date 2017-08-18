
<div class="row">
	<div class="col-lg-8" >
	<form action="system/add-article.php" method="post" enctype="multipart/form-data">
	<label>Judul</label>
		<input type="text" name="title" class="form-control" required >
	<label>Tanggal Kegiatan</label>
		<input type="date"  name="date" class="form-control" required>
	<label>Foto</label>
		<input type="file" name="photo" class="form-control" required >


	<label>Isi</label>
	<textarea class="form-control" required name="desc"></textarea>
<center>
	<button type="submit" class="btn btn-success" style="margin: 5px;">Simpan</button>	
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