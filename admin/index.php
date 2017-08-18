<?php 
ob_start();
session_start();

if (empty($_SESSION['username']) || empty($_SESSION['password'])) {
    header("location: login.php");
}
include('../conf/db.php');

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.assets/js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?></a>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <?php $p = @$_GET['p']; ?>
                    <li <?php echo $p == '' ? "class = 'active'": "";  ?>>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Konfirmasi Owner</a>
                    </li>
                    <li <?php echo $p == 'manage-owner' ? "class = 'active'": "";  ?>>
                        <a href="<?php echo "?p=manage-owner"; ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Kelola Owner</a>
                    </li>
                    <li <?php echo $p == 'manage-member' ? "class = 'active'": "";  ?>>
                        <a href="<?php echo "?p=manage-member"; ?>"><i class="fa fa-fw fa-table"></i> Kelola Member</a>
                    </li>
                    <li <?php echo $p == 'manage-event' ? "class = 'active'": "";  ?>>
                        <a href="<?php echo "?p=manage-event"; ?>"><i class="fa fa-fw fa-edit"></i> Kelola Event</a>
                    </li>
                    <li>
                        <a href="<?php echo "../system/logout.php"; ?>"><i class="fa fa-fw fa-desktop"></i> Logout</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->

                            <?php include('includes/pages.php'); ?>
                <!-- /.row -->
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="assets/js/plugins/morris/raphael.min.js"></script>
    <script src="assets/js/plugins/morris/morris.min.js"></script>
    <script src="assets/js/plugins/morris/morris-data.js"></script>
    <script type="text/javascript">
        $(document).on('submit','form',function(){
            $("button[type=submit]").attr('disabled','disabled');
        });
    </script>
<style type="text/css">
    @media (min-width: 768px){
    #page-wrapper {
    min-height: 1000px;
    padding: 10px;        
    }

}
</style>
</body>

</html>
