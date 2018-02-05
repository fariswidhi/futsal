<?php 
$id = addslashes($_GET['id']);
$query = mysqli_query($conn,"SELECT * FROM `agenda` LEFT JOIN owner_futsal ON agenda.id_owner = owner_futsal.id_owner where agenda.id='$id'");

$num = mysqli_num_rows($query);
if (empty($id) || $num ==0) {
header("Location: index.php?p=event"); /* Redirect browser */

exit();
}

$obj = mysqli_fetch_object($query);
 ?>
 <h1><?php echo $obj->judul; ?></h1>
 <h5 style="float: left;margin: 5px;">Diposting oleh <a href="#"><?php echo $obj->nama_futsal; ?></a></h5> 
 <h5 style="float: left;margin: 5px;">Tanggal Kegiatan <b><?php echo $obj->tanggal_kegiatan; ?></b></h5>

 <div class="container" style="margin-top: 50px;">
 <div class="col-lg-5" style="margin: 0 auto;float: none;">
 	<img src="<?php echo "uploads/".$obj->foto_agenda; ?>" class='img img-thumbnail'>

 </div>
  		<?php echo $obj->isiagenda; ?>
 </div>