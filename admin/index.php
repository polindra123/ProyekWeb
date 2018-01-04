<?php

error_reporting(0);
include 'koneksi.php';
$get=$_GET['page'];
 
if ( empty($get))
{
   include ('master/dashboard.php');	
}

elseif ($get=='lembaga')
{
  include ('M_lem/lembaga.php');
}

elseif ($get=='informasi')
{
  include ('M_pel/informasi.php');
}

elseif ($get=='kelulusan')
{
  include ('M_kel/kelulusan.php');
}

elseif ($get=='sertifikat')
{
  include ('M_ser/sertifikat.php');
}

?>