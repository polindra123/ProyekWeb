
<?php


error_reporting(0);
include 'koneksi.php';
$get=$_GET['page'];
 
if ( empty($get))
{
   include ('master/dashboard.php');	
}

elseif ($get=='Dat_lem')
{
  include ('M_lem/Dat_lem.php');
}

elseif ($get=='Dat_pel')
{
  include ('M_pel/Dat_pel.php');
}
?>