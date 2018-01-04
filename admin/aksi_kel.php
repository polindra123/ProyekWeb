<?php
include 'koneksi.php';

$g=$_GET['sender'];
if($g=='informasi')
{
 
              $sql1="INSERT INTO pelatihan(Id_lembaga, Kode_lembaga, Id_pelatihan, Nama_pelatihan, Kode_Pelatihan)
          VALUES ('$_POST[Id_lembaga]', '$_POST[Kode_lembaga]','$_POST[Id_pelatihan]', '$_POST[Nama_pelatihan]', '$_POST[Kode_pelatihan]')";  
        
        mysqli_query($config, $sql1);
                       /* $sql2="INSERT INTO informasi(Alamat, Kuota, Deskripsi)
                            VALUES ('$_POST[Alamat]', '$_POST[Kuota]','$_POST[Deskripsi]')";
                                    mysqli_query($config, $sql2);*/

        echo '<script LANGUAGE="JavaScript">
            alert("Anggota baru dengan nama :('.$_POST[Nama_pelatihan].') Tersimpan")
            window.location.href="index.php?page=informasi";
            </script>'; 
    }
     //header('location:http://localhost/');

else 
    if($g=='edit')
    {

        mysqli_query($config,"UPDATE pelatihan SET Id_pelatihan='$_POST[Id_pelatihan]',
            Kode_pelatihan='$_POST[Kode_pelatihan]', Nama_pelatihan='$_POST[Nama_pelatihan]' WHERE Id_pelatihan='$_POST[Id_pelatihan]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Anggota dengan nama :('.$_POST[Nama_pelatihan].') Di Update")
            window.location.href="index.php?page=informasi";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM pelatihan where Id_pelatihan='$_GET[Id_pelatihan]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Anggota dengan Id :('.$_GET[Id_pelatihan].') Di Terhapus")
            window.location.href="index.php?page=informasi";
            </script>';
    }
//End Aksi Anggota
?>
