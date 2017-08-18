<?php 
session_start();
 error_reporting(E_ALL);
ini_set('display_errors', 1);

include('conf/db.php');
 ?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://getbootstrap.com/examples/navbar/navbar.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
	<link rel="stylesheet" type="text/css" href="http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" type="text/css" href="http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/components/components-font-awesome/css/font-awesome.min.css">
	<script src='http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/components/wysihtml5x/dist/wysihtml5x-toolbar.min.js'></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
	<script src="http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/components/handlebars/handlebars.runtime.min.js"></script>
	<script src="http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min.js"></script>
</head>
<body>

    <div class="container">
    		<div class="row">
    			<div class="col-lg-12">
    				<div class="pull-right">
    					<h3>FutsalJogja</h3>
    				</div>
    			</div>
    		</div>
      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

            <?php if (@$_SESSION['type'] == 'owner'): ?>
            	
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="<?php echo "index.php?p=profil"; ?>">Profil</a></li>
              <li><a href="index.php?p=lapangan">Lapangan</a></li>
				<li><a href="<?php echo 'index.php?p=event' ?>">Event</a></li>
              <li><a href="index.php?p=book&act=booking">Booking</a></li>
				<li><a href="index.php?p=book&act=jadwal">Jadwalku</a></li>


				
			<li><a href="system/logout.php?s=user">Logout</a></li>
            <?php endif ?>
                <?php if (@$_SESSION['type'] == 'member'): ?>
            	
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="<?php echo "index.php?p=profil"; ?>">Profil</a></li>
              <li><a href="<?php echo "index.php?p=tempat-futsal"; ?>">Tempat Futsal</a></li>
				<li><a href="<?php echo 'index.php?p=event' ?>">Event</a></li>
              <li><a href="index.php?p=book&act=booking">Booking</a></li>
				<li><a href="index.php?p=book&act=jadwal">Jadwalku</a></li>
			<li><a href="system/logout.php?s=user">Logout</a></li>
            <?php endif ?>


            <?php if (empty(@$_SESSION['username']) || empty(@$_SESSION['password'])): ?>
            	              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="<?php echo "index.php?p=tempat-futsal"; ?>">Tempat Futsal</a></li>
              <li><a href="index.php?p=event">Event</a></li>
				<li><a href="<?php echo 'index.php?p=daftar' ?>">Daftar</a></li>
              <li><a href="index.php?p=login">Login</a></li>

            <?php endif ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">

              <li>
              <input type="text" name="" class="form-control" style="margin: 5px;">
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <?php 
include('includes/pages.php');
       ?>
    </div> <!-- /container -->

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('submit','form',function(){
			$("button[type=submit]").attr('disabled','disabled');
		})
	})
</script>
</body>
</html>