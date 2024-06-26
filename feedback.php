<?php
	include "inc/koneksi.php";
	include "inc/rupiah.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FEEDBACK KASSANDRAWIFI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords"
        content="wifi kassandra my id, kassandra my id, kassandra wifi, kassandra, kassandra hd production, KASSANDRA, KASSANDRA HD PRODUCTION">
    <meta name="description"
        content="Layanan hotspot wifi unlimited 24 jam non stop tanpa lemot kecuali saat wifi down">
    <meta name="author" content="KASSANDRA, KASSANDRA HD PRODUCTION">
    <meta content='index,follow' name='robots' />

    <!-- Favicon -->
    <link href="kassandra-wifi/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="kassandra-wifi/lib/animate/animate.min.css" rel="stylesheet">
    <link href="kassandra-wifi/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="kassandra-wifi/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="kassandra-wifi/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="kassandra-wifi/css/style.css" rel="stylesheet">

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- ttd digital -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="inc/signature/js/jquery.signature.min.js"></script>
    <script type="text/javascript" src="inc/signature/js/jquery.ui.touch-punch.min.js"></script>
    <link rel="stylesheet" type="text/css" href="inc/signature/css/jquery.signature.css">
       
    <div align="center"><noscript>
	<div style="position:fixed; top:0px; left:0px; z-index:3000; height:100%; width:100%; background-color:#FFFFFF">
	<div style="font-family: Arial; font-size: 17px; background-color:#00bbf9; padding: 11pt;">Mohon aktifkan javascript pada browser untuk mengakses halaman ini! <br>
	Hak web milik kassandra.my.id | Kassandra Production | All rights reserved.
	</div></div>
	</noscript></div>
	<script type="text/javascript">
	function disableSelection(e){if(typeof e.onselectstart!="undefined")e.onselectstart=function(){return false};else if(typeof e.style.MozUserSelect!="undefined")e.style.MozUserSelect="none";else e.onmousedown=function(){return false};e.style.cursor="default"}window.onload=function(){disableSelection(document.body)}
	</script>
</head>

<body>

<?php
//kode

$tanggal = date("Y-m-d");

 //id pelanggan 
$carikode = mysqli_query($koneksi,"SELECT id_feedback FROM tb_feedback order by id_feedback desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_feedback'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
$format = "F"."00".$tambah;
 	}else if (strlen($tambah) == 2){
 	$format = "F"."0".$tambah;
			}else (strlen($tambah) == 3){
			$format = "F".$tambah
				};

?>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status">
        </div>
        <i class="fa fa-wifi fa-2x text-primary position-absolute top-50 start-50 translate-middle"></i>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <!-- <div class="container-fluid bg-light px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Career</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Terms</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Privacy</a></li>
                </ol>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn-square text-primary pe-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Topbar End -->


    <!-- Brand & Contact Start -->
    <div class="container-fluid py-4 px-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row align-items-center top-bar">
            <div class="col-lg-4 col-md-12 text-center text-lg-start">
                <a href="" class="navbar-brand m-0 p-0">
                    <h1 class="fw-bold text-primary m-0"><i class="fa fa-wifi" aria-hidden="true"></i> KASSANDRAWIFI
                    </h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
            </div>
            <div class="col-lg-8 col-md-7 d-none d-lg-block">
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                                <i class="far fa-clock text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Jam layanan</p>
                                <h6 class="mb-0">Senin - Jum'at, <br> 08:00 a.m - 16:00 p.m</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                                <i class="fa fa-phone text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Call Us</p>
                                <h6 class="mb-0"><a href="https://wa.me/6281456141227">0814 - 5614 - 1227</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                                <i class="far fa-envelope text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Email Us</p>
                                <h6 class="mb-0"><a href="mailto:wifi@kassandra.my.id">wifi@kassandra.my.id</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand & Contact End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
        <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto p-3 p-lg-0">
                <a href="landingpage.php" class="nav-item nav-link ">Home</a>
                <a href="promo.php" class="nav-item nav-link">Promo</a>
                <a href="./kassandra-wifi/about.php" class="nav-item nav-link">About Us</a>
                <a href="./kassandra-wifi/service.php" class="nav-item nav-link">Services</a>
                <a href="./kassandra-wifi/project.php" class="nav-item nav-link">Projects</a>
                <a href="speedtest.php" class="nav-item nav-link">Speedtest</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="feedback.php" class="dropdown-item active">Feedback</a>
                        <a href="lapor.php" class="dropdown-item">Lapor ada kendala</a>
                        <a href="./kassandra-wifi/feature.php" class="dropdown-item">Features</a>
                        <a href="./kassandra-wifi/team.php" class="dropdown-item">Our Team</a>
                        <a href="./kassandra-wifi/testimonial.php" class="dropdown-item">Testimonial</a>
                        <a href="./kassandra-wifi/404.php" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="./kassandra-wifi/contact.php" class="nav-item nav-link">Contact Us</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Login Aplikasi</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="member.php" target="" class="dropdown-item">Members</a>
                        <a href="login.php" target="" class="dropdown-item">Our Team</a>
                    </div>
                </div>
            </div>
            <a href="register.php" target="" class="btn btn-sm btn-light rounded-pill py-2 px-4">Daftar sekarang ?</a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Feedback</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Feedback</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Feedback Start -->
    <div class="container-xxl">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Feedback Us</h6>
                <p class="text-center mb-4">*Berikan penilaianmu kepada kami untuk menjaga, meningkatkan kualitas layanan kami.</p>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="name@example.com" autocomplete="off" required>
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No HP / WA" value="62" autocomplete="off" required>
                                    <label for="no_hp">Nomor HP / WA</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" style="border: 2px solid #E5E4E2; border-radius: 4px;">
                               <label for="nilai" class="form-label">Berikan Penilaianmu Untuk Kami <br>
							    <small>1 = Jelek - 10 = Sangat baik</small></label> <br>
                                <!-- <input type="range" class="form-range" min="0" max="10" id="nilai" name="nilai" required> -->
                                <input type="radio" value="1" name="nilai" id="nilai" required> 1
                                <input type="radio" value="2" name="nilai" id="nilai" required> 2
                                <input type="radio" value="3" name="nilai" id="nilai" required> 3
                                <input type="radio" value="4" name="nilai" id="nilai" required> 4
                                <input type="radio" value="5" name="nilai" id="nilai" required> 5
                                <input type="radio" value="6" name="nilai" id="nilai" required> 6
                                <input type="radio" value="7" name="nilai" id="nilai" required> 7
                                <input type="radio" value="8" name="nilai" id="nilai" required> 8
                                <input type="radio" value="9" name="nilai" id="nilai" required> 9
                                <input type="radio" value="10" name="nilai" id="nilai" required> 10
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea type="text" style="height: 100pt;" class="form-control" id="feedback" name="feedback" placeholder="Tuliskan apa yang sudah baik dan perlu ditingkatkan lagi" required></textarea>
                                    <label for="feedback">Tuliskan apa yang sudah baik dan perlu ditingkatkan lagi</label>
                                </div>
                            </div>
                            
                            <div class="col-12 text-center">
                                <input type="submit" name="Simpan" value="Kirim feedback" class="btn btn-primary rounded-pill py-3 px-5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Register End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Ponorogo, Indonesia. 634 61</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0814 - 5614 - 1227</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>wifi@kassandra.my.id</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-0" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Gallery</h5>
                    <div class="row g-2">
                        <div class="col-4">
                            <img class="img-fluid rounded" src="kassandra-wifi/img/1.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="kassandra-wifi/img/2.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="kassandra-wifi/img/3.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="kassandra-wifi/img/4.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="kassandra-wifi/img/5.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="kassandra-wifi/img/6.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent border-secondary w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="any question ?" readonly>
                        <a href="kassandra-wifi/contact.php" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">klik..</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <?php echo date('Y'); ?></span> <a href="#">KASSANDRAWIFI</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        <br>Distributed By: <a class="border-bottom" href="https://themewagon.com"
                            target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a> -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="kassandra-wifi/lib/wow/wow.min.js"></script>
    <script src="kassandra-wifi/lib/easing/easing.min.js"></script>
    <script src="kassandra-wifi/lib/waypoints/waypoints.min.js"></script>
    <script src="kassandra-wifi/lib/counterup/counterup.min.js"></script>
    <script src="kassandra-wifi/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="kassandra-wifi/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="kassandra-wifi/js/main.js"></script>
</body>

</html>

<?php

    if (isset ($_POST['Simpan'])){
    
        $sql_simpan = "INSERT INTO tb_feedback (id_feedback, nama, no_hp, nilai, feedback, tanggal) VALUES (
           '".$format."',
           '".$_POST['nama']."',
		 			 '".$_POST['no_hp']."',
		 			 '".$_POST['nilai']."',
		 			 '".$_POST['feedback']."',
		 			 '".$tanggal."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Terima kasih, masukkan anda sudah kami terima dan akan kami baca demi meningkatkan pelayanan hotspot KassandraWiFi',text: '',icon: 'success',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'feedback.php';
          }
      })</script>";

		//Info Update Data Telegram serverku
		date_default_timezone_set('Asia/Jakarta');
		$date = date('d F Y').'%20';
		$time = date('H:i:s').'%0A';

		$id_feedback 		= $format.'%0A';
		$nama 				= $_POST['nama'].'%0A';
		$no_hp 				= $_POST['no_hp'].'%0A';
		$nilai 				= $_POST['nilai'].'%0A';
		$feedback 				= $_POST['feedback'].'%0A';

		$token = '1306451202:AAFL84nqcQjbAsEpRqVCziQ0VGty4qIAxt4';
		$chat_id = '1136312864';
		$message = 'Feedback Kassandra WiFi%0A'.$date.$time.'%0AID Feedback : '.$id_feedback.'Nama : '.$nama.'No HP : wa.me/'.$no_hp.'Nilai : '.$nilai.'Feedback : '.$feedback.'';
		//$api = 'https://api.telegram.org/botTokenBotAnda/sendMessage?chat_id=xxxx&text='.$message.'';
		$api = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chat_id.'&text='.$message.'';


		$ch = curl_init($api);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_URL, $api);
			$result = curl_exec($ch);
			curl_close($ch);
			return $result;

      }else{
      echo "<script>
      Swal.fire({title: 'Anda gagal menulis feedback ! pastikan semua data sudah benar..',text: '',icon: 'error',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'feedback.php';
          }
      })</script>";
    }
  }
    
?>
