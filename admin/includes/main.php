<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Owner</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Konfirmasi Owner</li>
        </ol>
    </div>
    </div>

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
<?php 
$q = mysqli_query($conn,"SELECT * from owner_futsal where status_aktif = '0'");
 ?>

 <?php if (isset($_SESSION['info'])): ?>
 	<?php echo $_SESSION['info']; ?>
 <?php unset($_SESSION['info']); endif ?>

                    <table class="table table-hover">
                        <thead>
                            <th>#</th><th>Nama</th><th>Nama Futsal</th><th>Foto</th><th>Aksi</th>
                        </thead>
                        <tbody>
                        <?php $no =1; while ($d = mysqli_fetch_object($q)) {

?>                        	<tr>
                        		<td><?php echo $no++; ?></td>
                        		<td><?php echo $d->nama_owner; ?></td>
                        		<td><?php echo $d->nama_futsal; ?></td>
                        		<td><?php echo $d->foto_futsal; ?></td>
                        		<td><a href="../system/approve.php?id=<?php echo $d->id_owner; ?>"><button class="btn btn-success"><i class="fa fa-check"></i></button></a> <a href="#"><button class="btn btn-danger"><i class="fa fa-remove"></i></button></a></td>
                        	</tr>
                        	<?php } ?>
                        </tbody>
                    </table>
                    </div>
                    </div>