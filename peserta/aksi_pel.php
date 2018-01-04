<?php
include 'koneksi.php';
$g=$_GET['sender'];
if($g=='edit')
{

        mysqli_query($config,"UPDATE peserta SET Nama_lengkap='$_POST[Nama_lengkap]' ,Email='$_POST[Email]', Telepon='$_POST[Telepon]', Jenis_kelamin='$_POST[Jenis_kelamin]', Agama='$_POST[Agama]', Alamat='$_POST[Alamat]' WHERE Id_peserta='$_POST[Id_peserta]'");
         echo '<script LANGUAGE="JavaScript">
            alert("lembaga dengan nama :('.$_POST[Nama_lengkap].') Di Update")
            window.location.href="index.php?page=lembaga";
            </script>';
    } 
//End Aksi lembaga
?>
