<?php
session_start();
if(isset($_GET['lang'])){
	// $_SESSION['lang'] = $_GET['lang'];
	$_SESSION['lang'] = 'fa';
}
elseif (!$_SESSION['lang']){
	$_SESSION['lang'] = 'fa';
}
include ('lang_'.$_SESSION['lang'].'.php');
?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Persika Team</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<header id="header" class="alt">

              
				<h1 class="textTitle">اپلیکیشن یر<sup class="supBT">ب </sup>یر</h1>
                <div class="orginalText">
                    
                    <p class="content">اپلیکیشن یر به یر بستری برای تهاتر کالا یا خدمات به صورت رایگان می باشد</p>
                </div>
                <div class="img">
                    <img src="./images/image.png" alt="">
                </div>
                
                <div class="downloads">
                    <a href="https://b2n.ir/y86210" style="margin: 0px;"><img
                            src="./images/badge-new 1.png" alt="" class="download" style="margin-top:0px;"></a>
                    <a href="https://b2n.ir/n82325" style="margin: 0px;"><img src="./images/Group 24.png" alt=""
                            class="download" style="margin-top:0px;"></a>
                            <!-- <a href="https://play.google.com/store/apps/details?id=org.legobyte.yerbeyer&hl=fa&gl=US" style="margin: 0px;"><img src="./images/google-play-badge (1) 1.png" alt=""
                                class="download" style="margin-top:0px;"></a> -->
                                <a href="https://b2n.ir/y86210" style="margin: 0px;"><img
                                    src="./images/Group 241.png" alt="" class="download" style="margin-top:0px;"></a>   
                </div>



						<!-- </br> -->
			
						<!-- <span class="logo"><img src="images/logo.svg" alt="" /></span> -->
		
						<!-- <h1><?php echo constant("web_theme_title"); ?></h1> -->
						<!-- </br> -->
						<!-- <h4><?php echo constant("content_for_student"); ?></h4> -->
					
					</br>
					</br>
					</br>

						<!-- <li><a href="phptoturialfirstime.php" class="button"><?php echo constant('class_php_time_first');?></a></li> -->
					</br>
			
						<!-- <li><a href="teacher.php" class="button"><?php echo constant('class_php_time_seond');?></a></li> -->
					</br>
						<!-- <li><a href="android.php" class="button"><?php echo constant('class_android_time_first');?></a></li> -->
					</br>
						<!-- <li><a href="teacher.php" class="button"><?php echo constant('class_android_time_second');?></a></li> -->
					</br>
					</header>



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