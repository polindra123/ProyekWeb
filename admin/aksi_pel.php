<?php
include 'koneksi.php';

$g=$_GET['sender'];
if($g=='informasi')
{

    $Id_lembaga = $_POST['Id_lembaga'];
    $Nama_pelatihan = $_POST['Nama_pelatihan'];
    $Kode_pelatihan = $_POST['Kode_pelatihan'];
    $Kuota = $_POST['Kuota'];
    $Alamat = $_POST['Alamat'];
    $Deskripsi = $_POST['Deskripsi'];
    $tgl1   = $_POST['tanggal1'];
    $bln1   = $_POST['bulan1'];
    $thn1   = $_POST['tahun1'];
    $tgl2   = $_POST['tanggal2'];
    $bln2  = $_POST['bulan2'];
    $thn2   = $_POST['tahun2'];


    $sql1 = "INSERT INTO pelatihan SET Id_lembaga='$Id_lembaga', Nama_pelatihan='$Nama_pelatihan', Kode_pelatihan='$Kode_pelatihan', Kuota='$Kuota', Alamat='$Alamat', Deskripsi='$Deskripsi', Tgl_mulai= '$thn1-$bln1-$tgl1', Tgl_akhir = '$thn2-$bln2-$tgl2' ";
        mysqli_query($config, $sql1);

        echo '<script LANGUAGE="JavaScript">
            alert("lembaga baru dengan nama :('.$_POST[Nama_pelatihan].') Tersimpan")
            window.location.href="index.php?page=informasi";
            </script>'; 
    }

else 
    if($g=='edit')
    {
    
    $tanggal3   = $_POST['tang1'];
    $bulan3   = $_POST['bul1'];
    $tahun3   = $_POST['tah1'];
    $tanggal4   = $_POST['tang2'];
    $bulan4  = $_POST['bul2'];
    $tahun4   = $_POST['tah2'];

        mysqli_query($config,"UPDATE pelatihan SET Id_pelatihan='$_POST[Id_pelatihan]', Nama_pelatihan='$_POST[Nama_pelatihan]' ,Kuota='$_POST[Kuota]', Alamat='$_POST[Alamat]', Tgl_mulai= '$tahun3-$bulan3-$tanggal3', Tgl_akhir='$tahun4-$bulan4-$tanggal4', Deskripsi='$_POST[Deskripsi]' WHERE Id_pelatihan='$_POST[Id_pelatihan]'");

         echo '<script LANGUAGE="JavaScript">
            alert("Anggota dengan nama :('.$_POST[Nama_pelatihan].') Di Update")
            window.location.href="index.php?page=informasi";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM pelatihan WHERE Id_pelatihan='$_GET[id]' ");
        mysqli_query($config,"DELETE FROM detail_pelatihan WHERE Id_pelatihan='$_GET[id]' ");
         echo '<script LANGUAGE="JavaScript">
            alert("pelatihan dengan Id :('.$_GET[Id_pelatihan].') Di Terhapus")
            window.location.href="index.php?page=informasi";
            </script>';
    }
//End Aksi Anggota
?>
