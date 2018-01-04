<?php
    session_start();

    // if ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != '' ) {
    //     $halaman = $_SESSION['user_login'];

    //     header('location:'.$halaman);
    //     exit();
    // } else
    if(empty($_SESSION['user_login'])) {
             
             echo '<script LANGUAGE="JavaScript">
            alert("Anda Harus Login Terlebih Dahulu")
            window.location.href="../login.php";
            </script>';
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Depnaker Indramayu</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/dashbord.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/index.css">
      
  </head> 
  <body>

  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span></button>
        <a class="navbar-brand" href="index.php">Selamat Datang
          <?php
           session_start();
                    $ss = $_SESSION['sess_id'] ;
                      $sql="SELECT  Nama_lembaga FROM lembaga WHERE Id_user='$ss'";
                        $result=  mysqli_query($config, $sql);
                       if (mysqli_num_rows($result)> 0){
                              while ($row=  mysqli_fetch_assoc($result)){
                                    echo "$row[Nama_lembaga]";

                            }
                          }
                    ?>
        </a>
      </div> 
    </div>
  </nav>