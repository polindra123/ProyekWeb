
<?php

error_reporting(0);
include 'koneksi.php';
$get=$_GET['page'];
 
if ( empty($get))
{
   include ('master/dashboard.php');	
}

elseif ($get=='tentang')
{
  include ('master/tentang.php');
}

elseif ($get=='lpk')
{
  include ('master/lpk.php');
}

elseif ($get=='profil')
{
  include ('master/profil.php');
}

elseif ($get=='kontak')
{
  include ('master/kontak.php');
}

elseif ($get=='biodata')
{
  include ('M_bio/Dat_bio.php');
}

elseif ($get=='pelatihan')
{
  include ('M_pel/Dat_pel.php');
}
?>