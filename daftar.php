<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register | Depnaker Indramayu</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/css_login.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4 form-login">
        <div class="header-login">
            <h3 align="center">Halaman Pendaftaran</h3>
        </div>

    <div class="konten-form-login">
        <form action="" method="post">

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control input-sm" placeholder="Masukan Username">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="Password" name="password" class="form-control input-sm" placeholder="Masukan Password">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="text" name="Nama_lengkap" id="Nama_lengkap" class="form-control" placeholder="Masukan Nama Lengkap Anda" />
            </div>

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <select name ="Jenis_kelamin" class="form-control">
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <select name ="Agama" class="form-control">
                            <option>Islam</option>
                            <option>Hindu</option>
                            <option>Budha</option>
                            <option>Kristen</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5"><br>
                    <div class="form-group">
                        <input type="text" name="Tempat_lahir" class="form-control" placeholder="Tempat Lahir Anda" />
                    </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7">
                    <div class="form-group">
                            <h6><center>Tanggal Lahir</center></h6>
                            <select name="tanggal">
                            <?php
                                for($i=1; $i<=31; $i++)
                                echo "<option value=$i>$i</option>";
                            ?>
                            </select>
                            <select name="bulan">
                                <option value="1">Januari</option><option value="2">Februari</option><option value="3">Maret</option>
                                <option value="4">April</option><option value="5">Mei</option><option value="6">Juni</option>
                                <option value="7">Juli</option><option value="8">Agustus</option><option value="9">September</option>
                                <option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option>
                            </select>
                            <select name="tahun">
                            <?php
                                for($i=1970; $i<=2000; $i++)
                                echo "<option value=$i>$i</option>";
                            ?>
                            </select>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <textarea type="text" name="Alamat" id="Alamat" class="form-control input-sm" placeholder="Masukan Alamat Anda"></textarea> 
            </div>

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="Email"  class="form-control" placeholder="Masukan Email Anda" />
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="Telepon"  class="form-control" placeholder="Nomer Telepon Anda" />
                    </div>
                </div>
            </div>

            <div align="right">
                <a href="login.php">Sudah Punya Akun</a>
            </div>

            <div class="form-group">
                <input type="submit" value="Daftar" class="tombol" name="daftar">
            </div>
        </form>
    </div>
</body>
</html>
<?php
include 'koneksi.php';

if (@$_POST['daftar']) {

  $username = @$_POST['username'];
  $password = @$_POST['password'];
  $Nama_lengkap = @$_POST['Nama_lengkap'];
  $Jenis_kelamin = @$_POST['Jenis_kelamin'];
  $Agama = @$_POST['Agama'];
  $Email = @$_POST['Email'];
  $Telepon = @$_POST['Telepon'];
  $Alamat = @$_POST['Alamat'];
  $Tempat_lahir = @$_POST['Tempat_lahir'];
  $tgl   = @$_POST['tanggal'];
  $bln   = @$_POST['bulan'];
  $thn   = @$_POST['tahun'];


  $sql1 = "INSERT INTO user SET username='$username', password='$password', level='peserta'";
        mysqli_query($config, $sql1);

        $sql2 = "SELECT Id_user from user WHERE username='$username'";
            $result = mysqli_query($config, $sql2);
            $dapat=mysqli_num_rows($result);
       
            if ($dapat>0) {
                while ( $r = mysqli_fetch_array($result)) {
                $user=$r['Id_user'];
                 $sql3 = "INSERT INTO peserta SET Nama_lengkap='$Nama_lengkap', Jenis_kelamin='$Jenis_kelamin', Agama='$Agama', Email='$Email', Telepon='$Telepon', Alamat='$Alamat', Tempat_lahir='$Tempat_lahir', Tanggal_lahir  = '$thn-$bln-$tgl', Id_user='$user'";
                    mysqli_query($config, $sql3);
                }
            }
            else{
                echo "alert('gagal');";
            }


?>
 <script type="text/javascript">
  alert("REGISTER berhasil");
  window.location.href="login.php"

</script> 

<?php  }
 ?>