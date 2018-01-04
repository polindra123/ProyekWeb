<?php
include 'koneksi.php';
$g=$_GET['sender'];
if($g=='edit')
{

        mysqli_query($config,"UPDATE lembaga SET Nama_lembaga='$_POST[Nama_lembaga]', Alamat='$_POST[Alamat]' WHERE Id_lembaga='$_POST[Id_lembaga]'");
         echo '<script LANGUAGE="JavaScript">
            alert("lembaga dengan nama :('.$_POST[Nama_lembaga].') Di Update")
            window.location.href="index.php?page=Dat_lem";
            </script>';
    } 
//End Aksi lembaga
?>
