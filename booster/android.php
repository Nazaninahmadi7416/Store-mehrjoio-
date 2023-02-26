<?php

  require_once "db.php";

session_start();

if(isset($_GET['lang'])){

	$_SESSION['lang'] = 'fa';

}

elseif (!$_SESSION['lang']){

	$_SESSION['lang'] = 'fa';

}

include ('lang_'.$_SESSION['lang'].'.php');





?>

<!DOCTYPE HTML>

<html>

	<head>

		<title>madali_z</title>

		<!-- <meta charset="utf-8" /> -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
   	     <!-- THIS LINE -->
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="assets/css/main.css" />

		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

	</head>

	<body class="is-preload">

            </br>

            </br>

            </br>

		<!-- Wrapper -->

			<div id="wrapper">
				<!-- Main -->
					<div id="main">
						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2 class="<?php echo constant('direction_'); ?>"><?php echo constant('intro_title'); ?></h2>
										</header>
									</div>
									<span class="image"><img src="images/pic0111.jpg" alt="" /></span>
								</div>

								<p>
								<a class="btn btn-primary btn-lg btn-block" data-toggle="collapse" href="#collapseExample" 
								role="button" aria-expanded="false" 
								aria-controls="collapseExample">
									نرم افزار های مورد نیاز 
								</a>

								</p>
								<div class="collapse" id="collapseExample">
								<div class="card card-body rtlbody">
									برای شروع نیاز است نرم افزار های زیر را نصب کنید 
								</div>
								<div class="card card-body rtlbody">
								<a href="https://soft98.ir/mobile/16739-google-android-studio.html" class="btn btn-primary"><?php echo constant('android');?></a>
								</div>
								</br>
								</br>
								</div>

								<p>
								<a class="btn btn-primary btn-lg btn-block" data-toggle="collapse" href="#collapse1" 
								role="button" aria-expanded="false" 
								aria-controls="collapse1">
									جلسه اول
								</a>

								</p>
								<div class="collapse" id="collapse1">
								<div class="card card-body rtlbody">
								<a href="http://school.persikateam.com/uploads/android1.pdf" class="btn btn-primary"><?php echo constant('t1');?></a>
								</div>
								</br>


								
							</section>





					





		<!-- Scripts -->

			<script>

				function change_lang(value){

					window.location.replace("?lang="+value);

				}

			</script>

			<script src="assets/js/jquery.min.js"></script>

			<script src="assets/js/jquery.scrollex.min.js"></script>

			<script src="assets/js/jquery.scrolly.min.js"></script>

			<script src="assets/js/browser.min.js"></script>

			<script src="assets/js/breakpoints.min.js"></script>

			<script src="assets/js/util.js"></script>

			<script src="assets/js/main.js"></script>



	</body>

</html>