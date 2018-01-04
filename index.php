<?php

error_reporting(0);
include 'koneksi.php';
$get=$_GET['page'];
 
if ( empty($get))
{
   include ('dashboard.php');    
}

elseif ($get=='profil')
{
  include ('Profil.php');
}

elseif ($get=='kontak')
{
  include ('kontak.php');
}

elseif ($get=='tentang')
{
  include ('tentang.php');
}

elseif ($get=='lpk')
{
  include ('lpk.php');
}

elseif ($get=='daftar')
{
  include ('daftar.php');
}

elseif ($get=='login')
{
  include ('login.php');
}
?>