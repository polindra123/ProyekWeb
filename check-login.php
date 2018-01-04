<?php
	session_start();
	require "koneksi.php";

	if (isset($_POST['username']) && isset($_POST['password']) ) {
		if($_POST['captcha'] == $_SESSION['captcha'])
    {
	    
		$sql_check = "SELECT username,level, Id_user FROM user WHERE username=? AND password=? LIMIT 1";
	    
	    $check_log = $config->prepare($sql_check);
	    $check_log->bind_param('ss', $username, $password);

	    $username = $_POST['username'];
	    $password = $_POST['password'];

	    $check_log->execute();
	    $check_log->store_result();

		if ( $check_log->num_rows == 1 ) {
	        $check_log->bind_result($username, $level, $Id_user);

	        while ( $check_log->fetch() ) {
	            $_SESSION['user_login'] = $level;
	            $_SESSION['sess_id']    = $Id_user;
	            $_SESSION['nama']       = $username;
	            
	        }
	
	        $check_log->close();
	        header('location:'.$level);

	        exit();
	    } if(empty($username) || empty($password)){
            echo '<script language="javascript">alert("Username Maupun Password Tidak Boleh Kosong!"); document.location="login.php";</script>';
        } 
	    else {
	        header('location: login.php?error='.base64_encode('Username dan Password Invalid!!!'));
	        exit();
	    }

	}else {
        echo '<script language="javascript">alert("Maaf, Captcha salah!!"); document.location="login.php";</script>';
    } 

}
        else {
    	header('location:login.php');
    	exit();
	}