<?php
include "inc/koneksi.php";
   
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="keywords" content="wifi kassandra my id, kassandra my id, kassandra, kassandra hd production, KASSANDRA, KASSANDRA HD PRODUCTION">
    <meta name="description" content="Layanan hotspot wifi unlimited 24 jam non stop tanpa lemot kecuali saat wifi down">
 	<meta name="author" content="KASSANDRA, KASSANDRA HD PRODUCTION">
    <meta content='index,follow' name='robots'/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aplikasi KASSANDRA WIFI</title>
	<link rel="shortcut icon" href="dist/img/favicon.ico" type="image/x-icon">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition" background="dist/img/bgmember.jpg" style="background-size: cover;">
	<div class="login-box">
		<div class="login-logo">

		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<center>
				<img src="dist/img/komp.png" width=170px />
				<h4>
					<b>
						APLIKASI TAGIHAN INTERNET KASSANDRA WIFI
					</b>
				</h4>
				<BR>
			</center>
			<form action="#" method="post">
				<div class="form-group has-feedback">
					<label>Nama Akun / Email / No Handphone</label>
					<input type="text" class="form-control" name="email" id="email" placeholder="tuliskan data dengan benar" autocomplete="on" required >
					<span class="glyphicon glyphicon-user form-control-feedback" ></span>
				</div>
				<div class="form-group has-feedback">
					<label>Password</label>
					<input type="text" class="form-control" name="password" placeholder="tuliskan password dengan benar" autocomplete="off" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">

					</div>
					<!-- /.col -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary btn-block" name="btnLogin" title="Masuk Sistem">
							<b>MASUK</b>
						</button>
						<br>
						<p>Lupa Akun / Lainnya ? Klik <a href="lapor.php"><u>LAPOR</u></a> admin..</p>
						<br>
						<center>
							<strong>Copyright &copy; 2019 - <?php echo date('Y'); ?>
							<a href="https://bit.ly/kassandrahdproduction" target="blank">KassandraWifi</a>.</strong> All rights reserved.
						</center><br>
						<a href="login.php" title="Halaman Adminintrator" class="btn btn-default btn-sm">
							<i class="glyphicon glyphicon-user"></i>
						</a>
					</div>
					<!-- /.col -->
				</div>
			</form>
			<!-- /.social-auth-links -->

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 2.2.3 -->
	<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!-- sweet alert -->
</body>

</html>



<?php 
		if (isset($_POST['btnLogin'])) {  
		
		$email=mysqli_real_escape_string($koneksi,$_POST['email']);
		$no_hp=mysqli_real_escape_string($koneksi,$_POST['email']);
		$nama=mysqli_real_escape_string($koneksi,$_POST['email']);
		$password=mysqli_real_escape_string($koneksi,$_POST['password']);


		$sql_login = "SELECT * FROM tb_pelanggan WHERE status_plg='Aktif' AND (email='$email' OR no_hp='$no_hp' OR nama='$nama' ) AND password='$password'";
		$query_login = mysqli_query($koneksi, $sql_login);
		$data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
		$jumlah_login = mysqli_num_rows($query_login);
        

            if ($jumlah_login == 1  && $data_login["level"] == "PLG"){
              session_start();
			  $_SESSION["ses_id"]=$data_login["id_pelanggan"];
			  $_SESSION["ses_email"]=$data_login["email"];
              $_SESSION["ses_nama"]=$data_login["nama"];
			  $_SESSION["ses_password"]=$data_login["password"];
			  $_SESSION["ses_no_hp"]=$data_login["no_hp"];
			  $_SESSION["ses_level"]=$data_login["level"];
                
              echo "<script>
                    Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'aplication.php';
                        }
                    })</script>";
              }else{
              echo "<script>
                    Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'member.php';
                        }
                    })</script>";
                }
				
			  }
