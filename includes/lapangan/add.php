
<div class="row">
	<div class="col-lg-8" >
	<form action="system/tambah-lapangan.php" method="post" enctype="multipart/form-data">
	<label>Nama Lapangan</label>
		<input type="text" name="name" class="form-control" required >
	<label>Foto Lapangan</label>
		<input type="file"  name="foto" class="form-control" required ">
	<label>Ket Lapangan</label>
		<textarea class="form-control" required name="info"></textarea>
	<label>Info Harga/Jam</label>
	<textarea class="form-control" name="harga"></textarea>

<center>
	<button type="submit" class="btn btn-success" style="margin: 5px;">Daftar</button>	
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