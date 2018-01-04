<?php
include 'koneksi.php';
$g=$_GET['sender'];
if($g=='edit')
{

	$tgl   = $_POST['tanggal'];
    $bln   = $_POST['bulan'];
    $thn   = $_POST['tahun'];

        mysqli_query($config,"UPDATE peserta SET Nama_lengkap='$_POST[Nama_lengkap]' ,Email='$_POST[Email]', Telepon='$_POST[Telepon]', Jenis_kelamin='$_POST[Jenis_kelamin]', Agama='$_POST[Agama]', Alamat='$_POST[Alamat]', Tempat_lahir='$_POST[Tempat_lahir]', Tanggal_lahir= '$thn-$bln-$tgl' WHERE Id_peserta='$_POST[Id_peserta]'");
	
		         echo '<script LANGUAGE="JavaScript">
		            alert("Biodata peserta dengan nama ('.$_POST[Nama_lengkap].') Telah diupdate")
		            window.location.href="index.php?page=biodata";
		            </script>';
    } 
?>
