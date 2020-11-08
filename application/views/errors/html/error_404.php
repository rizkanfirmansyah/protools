<?php
$baseurl = 'http://' . $_SERVER['HTTP_HOST'] . '/chat/';
?>

<!DOCTYPE html>
<html dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, Ample lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Ample admin lite dashboard bootstrap 4 dashboard template">
	<meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
	<meta name="robots" content="noindex,nofollow">
	<title>Ample Admin Lite Template by WrapPixel</title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
	<link rel="icon" type="<?= $baseurl . 'assets/' ?>image/png" sizes="16x16" href="plugins/images/favicon.png">
	<link href="<?= $baseurl . 'assets/' ?>css/style.min.css" rel="stylesheet">
</head>

<body>
	<div class="main-wrapper">
		<div class="preloader">
			<div class="lds-ripple">
				<div class="lds-pos"></div>
				<div class="lds-pos"></div>
			</div>
		</div>
		<div class="error-box">
			<div class="error-body text-center">
				<h1 class="error-title text-danger">404</h1>
				<h3 class="text-uppercase error-subtitle">PAGE NOT FOUND !</h3>
				<p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
				<a href="<?= $baseurl . 'home' ?>" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">Back to home</a>
			</div>
		</div>
	</div>
	<script src="<?= $baseurl . 'assets/' ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?= $baseurl . 'assets/' ?>plugins/bower_components/popper.js/dist/umd/popper.min.js"></script>
	<script src="<?= $baseurl . 'assets/' ?>bootstrap/dist/js/bootstrap.min.js"></script>
	<script>
		$('[data-toggle="tooltip"]').tooltip();
		$(".preloader").fadeOut();
	</script>
</body>

</html>