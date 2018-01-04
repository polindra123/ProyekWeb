<?php
include 'koneksi.php';
if ($_POST[status] == "tidak") {
	$sql1=mysqli_query($config,"UPDATE detail_pelatihan SET status='{$_POST['status']}' 
 													 WHERE Id_pelatihan='{$_POST['pelatihan']}' AND Id_lembaga='{$_POST['lembaga']}' 
 													 AND Id_peserta='{$_POST['peserta']}'");
	print "<meta http-equiv=\"refresh\"
	content=\"1;URL=index.php?page=kelulusan\">";
	exit;
}
	$set = true;
	$msg = "";
	$tipe_file = $_FILES['sertifikat']['type'];
	$lokasi_file = $_FILES['sertifikat']['tmp_name'];
	$nama = $_FILES['sertifikat']['name'];
	$save_file =move_uploaded_file($lokasi_file,"../image/$nama");
 		
 	if(empty($lokasi_file)){
		$set=false;
		$msg= $msg. 'Upload gagal, Anda Lupa Mengambil Gambar..';
	 }
 	else
 	{
 if ($tipe_file != "image/gif" and
 	$tipe_file != "image/jpeg" and
	$tipe_file != "image/jpg" and
	$tipe_file != "image/pjpeg" and
	$tipe_file != "image/png")
 	{
 	
 	$set=false;
 	$msg= $msg. 'Upload gagal, tipe file harus image..';
 	}
 	else
 	{
		isset($save_file);
 	}
		if($save_file)
	{
 		chmod("../image/$nama", 0777);
	}
		else
	{
 	$msg = $msg.'Upload Image gagal..';
 	$set = false;
 			print "<meta http-equiv=\"refresh\"
	content=\"1;URL=index.php?page=kelulusan\">";
		}
	}
	if($set)
	{
 	$sql=mysqli_query($config,"UPDATE detail_pelatihan SET sertifikat='{$nama}', status='{$_POST['status']}' 
 													 WHERE Id_pelatihan='{$_POST['pelatihan']}' AND Id_lembaga='{$_POST['lembaga']}' 
 													 AND Id_peserta='{$_POST['peserta']}'");
 	if(!$sql) {
 		echo "error";
 		exit();
 	}
 	$msg= $msg.'Berhasil Input';
		print "<meta http-equiv=\"refresh\"
	content=\"1;URL=index.php?page=kelulusan\">";
		}
 	echo "$msg";
?>