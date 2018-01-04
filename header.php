<?php
    session_start();

    if ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != '' ) {
        $halaman = $_SESSION['user_login'];

        header('location:'.$halaman);
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Depnaker Indramayu</title>
	     <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/dashbord.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/index.css">

</head>
<body>
	<!-- header -->
       <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h1 align="center"><img src="image/logo.png" width="100%" height="auto"></h1>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                <nav style="padding-top: 20px;">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="index.php" style="color: black">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black">Profil <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=profil">Profil Lengkap</a></li>
                                    <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=kontak">Kontak</a></li>
                                </ul>
                        </li>
                        <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=tentang" style="color: black">Tentang</a></li>
                        <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=lpk" style="color: black">Lpk</a></li>
                    </ul>
                </nav>
                </div>
            </div>
        </div>
    </header>