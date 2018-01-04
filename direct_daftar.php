<?php
    session_start();

    if ( isset($_SESSION['user_login'])){

        if ($_SESSION['user_login'] == "petugas") {
             
             echo '<script LANGUAGE="JavaScript">
            alert("Maaf Anda Bukan Peserta")
            window.location.href="petugas/index.php";
            </script>';
        }
        else{

             include "koneksi.php";
            
            $sql1 = "SELECT * FROM peserta where Id_user = '$_SESSION[sess_id]'";
            $cek = mysqli_query($config, $sql1);
            $row=  mysqli_fetch_assoc($cek);

            $sql2 = "SELECT * FROM detail_pelatihan where Id_pelatihan='$_GET[id]' and Id_peserta='$row[Id_peserta]'";
        	$cek2 = mysqli_query($config, $sql2);
            $row2=  mysqli_fetch_assoc($cek2);

            $sql3 = "SELECT * FROM pelatihan where Id_pelatihan='$_GET[id]'";
            $cek3 = mysqli_query($config, $sql3);
            $row3=  mysqli_fetch_assoc($cek3);

            echo "$row2[Id_pelatihan], $row2[Id_peserta], $row3[Kuota]";

             if ($row2 > 0) {
              echo '<script LANGUAGE="JavaScript">
             alert("Maaf Anda sudah mendaftar di pelatihan ini")
             window.location.href="index.php";
             </script>';
              }

             else{
                if ($row3['Kuota'] <= 0) {
              echo '<script LANGUAGE="JavaScript">
             alert("Maaf Kuota Pelatihan Habis")
             window.location.href="index.php";
             </script>';
              } else{

    		  $sql3 = "INSERT INTO detail_pelatihan SET Id_pelatihan='$_GET[id]', Id_peserta='$row[Id_peserta]',Id_lembaga='$_GET[kd]'";
         	 $cek = mysqli_query($config, $sql3);

        	 if ($cek) {
            $sql4 = "UPDATE pelatihan SET Kuota = Kuota - 1 WHERE Id_pelatihan = '$_GET[id]'";
            $cek = mysqli_query($config, $sql4);

        	 echo '<script LANGUAGE="JavaScript">
            alert("Pendaftaran Sukses")
            window.location.href="peserta/index.php?page=pelatihan";
            </script>';
        	 }
        	 else{
        	 	echo "daftar gagal";
        	 }
            }
        }  
    }

     } 
     else{
        	header('location: login.php');
     }
 
?>