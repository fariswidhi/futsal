<?php 
    $halaman = 10;
  $page = isset($_GET["n"]) ? (int)$_GET["n"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $result = mysqli_query($conn,"SELECT * from member where status = '0'");
  $total = mysqli_num_rows($result);
  $pages = ceil($total/$halaman);            
  $query = mysqli_query($conn,"SELECT * from member where status = '0' LIMIT $mulai, $halaman");
  $no =$mulai+1;
 ?>
                 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Member 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Data Member
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
                            <th>#</th><th>Nama Member</th><th>Username</th><th>Telepon</th><th>Alamat</th><th>Aksi</th>
                        </thead>
                        <tbody>
                        <?php $no =1; while ($d = mysqli_fetch_object($query)) {

?>                        	<tr>
                        		<td><?php echo $no++; ?></td>
                                <td><?php echo $d->username_member; ?></td>
                        		<td><?php echo $d->nama_member; ?></td>
                        		<td><?php echo $d->telephone_member; ?></td>
                        		<td><?php echo $d->alamat_member; ?></td>
                        		<td><a href="<?php echo "index.php?p=manage-member&act=detail&id=".$d->id_member; ?>"><button class="btn btn-info"><i class="fa fa-info"></i></button></a> 
                                <a href="<?php echo "index.php?p=manage-member&act=edit&id=".$d->id_member; ?>"><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></a></td>
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