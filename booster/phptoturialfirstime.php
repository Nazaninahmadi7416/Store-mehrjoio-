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
								<a href="https://soft98.ir/software/programming/53-visual-studio-code-1.html" class="btn btn-primary"><?php echo constant('Visual_Studio_Code');?></a>
								</div>
								</br>
								<div class="card card-body rtlbody">
								<a href="https://soft98.ir/script/3381-wampserver-be.html" class="btn btn-primary"><?php echo constant('wampserver');?></a>
								</div>
								</br>
								<div class="card card-body rtlbody">
									<?php echo constant('xamptitle');?>
								</div>
								</br>
								<div class="card card-body rtlbody">
								<a href="https://soft98.ir/internet/webmaster-tools/13861-xampp-download.html" class="btn btn-primary"><?php echo constant('xampp');?></a>
								</div>
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
								<a href="#pdf" class="btn btn-primary"><?php echo constant('toturialwampinstall');?></a>
								</div>
								</br>
								<div class="card card-body rtlbody">
								         آن را اجرا گنید سپس مرور گر خود را باز کنید و در قسمت نوار وارد کردن ادرس سایت  xamp یا  wampserver  پس از نصب نرم افزار     
								</div>
								<div class="card card-body rtlbody">
								  وارد کنید 	localhost  عبارت 
								</div>
								</div>


								<p>
								<a class="btn btn-primary btn-lg btn-block" data-toggle="collapse" href="#collapse2" 
								role="button" aria-expanded="false" 
								aria-controls="collapse2">
									جلسه دوم
								</a>

								</p>
								<div class="collapse" id="collapse2">
								<div class="card card-body rtlbody">
								<a href="http://school.persikateam.com/uploads/1.mp4" class="btn btn-primary"><?php echo constant('downloadvideo1');?></a>
								</div>
								</br>
								<div class="card card-body rtlbody">
								<a href="http://school.persikateam.com/uploads/newproject.zip" class="btn btn-primary"><?php echo constant('downloadsource1');?></a>
								</div>
								</div>


								<p>
								<a class="btn btn-primary btn-lg btn-block" data-toggle="collapse" href="#collapse3" 
								role="button" aria-expanded="false" 
								aria-controls="collapse3">
									جلسه سوم
								</a>

								</p>
								<div class="collapse" id="collapse3">
								<div class="card card-body rtlbody">
								<a href="http://school.persikateam.com/uploads/2.mp4" class="btn btn-primary"><?php echo constant('downloadvideo2');?></a>
								</div>
								</br>
								<div class="card card-body rtlbody">
								<a href="http://school.persikateam.com/uploads/newproject2.zip" class="btn btn-primary"><?php echo constant('downloadsource1');?></a>
								</div>
								</div>

								
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