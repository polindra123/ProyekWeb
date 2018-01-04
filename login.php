
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login | Depnaker Indramayu</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/css_login.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="col-md-4 col-md-offset-4 form-login">
        <div class="header-login">
            <h3 align="center">Halaman Login</h3>
        </div>

        	<div class="konten-form-login">
               	<form action="check-login.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                                
                    <div class="form-group">
                        <input name="captcha" type="text" maxlength="7" size="37" placeholder="Masukan captcha"> <img src="captcha.php">
                    </div>

                    <div align="right">
                        <a href="daftar.php">Belum Punya Akun ?</a>
                    </div>
                        <?php
                            /* handle error */
                            if (isset($_GET['error'])) : ?>
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
                                </div>
                            <?php endif;?>
                                <input type="submit" class="tombol" value="LOGIN" />             

                </form>
            </div>
        </div>
</body>
</html>
