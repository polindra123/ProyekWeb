<?php
include 'koneksi.php';

$g=$_GET['sender'];
if($g=='lembaga')
{


    $username = $_POST['Kode_lembaga'];
    $password = $_POST['Kode_lembaga'];
    $Kode_lembaga = $_POST['Kode_lembaga'];
    $Nama_lembaga = $_POST['Nama_lembaga'];
    $Alamat = $_POST['Alamat'];

    $sql1 = "INSERT INTO user SET username='$username', password='$password', level='petugas'";
        mysqli_query($config, $sql1);

        $sql2 = "SELECT Id_user from user WHERE username='$username'";
            $result = mysqli_query($config, $sql2);
            $dapat=mysqli_num_rows($result);
       
            if ($dapat>0) {
                while ( $r = mysqli_fetch_array($result)) {
                $user=$r['Id_user'];

                 $sql3 = "INSERT INTO lembaga SET Kode_lembaga='$Kode_lembaga', Nama_lembaga='$Nama_lembaga', Alamat='$Alamat', Id_user='$user'";
                    mysqli_query($config, $sql3);
                }
            }
            else{
                echo "alert('gagal');";
            }
                        

        echo '<script LANGUAGE="JavaScript">
            alert("lembaga baru dengan nama :('.$_POST[Nama_lembaga].') Tersimpan")
            window.location.href="index.php?page=lembaga";
            </script>'; 
    }       
     //header('location:http://localhost/');

else 
    if($g=='edit')
    {

        mysqli_query($config,"UPDATE lembaga SET Id_lembaga='$_POST[Id_lembaga]',
            Nama_lembaga='$_POST[Nama_lembaga]', Alamat='$_POST[Alamat]' WHERE Id_lembaga='$_POST[Id_lembaga]'");
         echo '<script LANGUAGE="JavaScript">
            alert("lembaga dengan nama :('.$_POST[Nama_lembaga].') Di Update")
            window.location.href="index.php?page=lembaga";
            </script>';
    } 
else 
    if($g=='hapus')
    {   
        mysqli_query($config,"DELETE FROM pelatihan WHERE Id_pelatihan='$_GET[pes]'");
        mysqli_query($config,"DELETE FROM lembaga where Id_user='$_GET[id]'");
        mysqli_query($config,"DELETE FROM user where Id_user='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("lembaga dengan Id :('.$_GET[Id_lembaga].') Di Terhapus")
            window.location.href="index.php?page=lembaga";
            </script>';
    }
//End Aksi lembaga
?>