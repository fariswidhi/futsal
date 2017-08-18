

<?php 
 $page = isset($_GET["n"]) ? (int)$_GET["n"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $result = mysqli_query($conn,"SELECT * from agenda left join owner_futsal on agenda.id_owner = owner_futsal.id_owner");
  $total = mysqli_num_rows($result);
  $pages = ceil($total/$halaman);            
  $q = mysqli_query($conn,"SELECT * from agenda left join owner_futsal on agenda.id_owner = owner_futsal.id_owner LIMIT $mulai, $halaman")or die(mysql_error);
  $no =$mulai+1;
 
 ?>

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Event 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Data Event
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">


<?php if (isset($_SESSION['info'])): ?>
    <?php echo $_SESSION['info']; ?>
<?php unset($_SESSION['info']); endif; ?>
                    <table class="table table-hover">
                        <thead>
                            <th>#</th><th>Nama Futsal</th><th>Tanggal Posting</th><th>Judul</th><th>Foto Event</th><th>Aksi</th>
                        </thead>
                        <tbody>
                        <?php $no =1; while ($d = mysqli_fetch_object($q)) {

?>                        	<tr>
                        		<td><?php echo $no++; ?></td>
                        		<td><?php echo $d->nama_futsal; ?></td>
                        		<td><?php echo $d->tanggal_posting; ?></td>
                        		<td><?php echo $d->judul; ?></td>
                                <td><?php echo $d->foto_agenda; ?></td>
                        	<td><a href="../system/delete-event.php<?php echo "?id=".$d->id; ?>"><button class="btn btn-danger"><i class="fa fa-remove"></i></button></a> </td>
                        	</tr>
                        	<?php } ?>
                        </tbody>
                    </table>


                    <ul class="pagination"> 
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
    <li <?php if($page == $i){echo "class='active'";}  ?>><a href="index.php?p=manage-member&n=<?php echo $i; ?>"><?php echo $i; ?></a></li>
     <?php } ?>
 
</ul>
</div>
</div>