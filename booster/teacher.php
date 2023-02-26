<?php
  require_once "db.php";
session_start();
if(isset($_GET['lang'])){
	$_SESSION['lang'] = $_GET['lang'];
}
elseif (!$_SESSION['lang']){
	$_SESSION['lang'] = 'en';
}
include ('lang_'.$_SESSION['lang'].'.php');

if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    // $password = mysqli_real_escape_string($conn, $_POST['password']);
    // $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']); 
    if(!empty($_FILES['uploaded_file']))
    {
      $path = "uploads/";
      $path = $path . basename( $_FILES['uploaded_file']['tmp_name']);
      $temp = explode(".", $_FILES["uploaded_file"]["name"]);
    //   $newfilename = round(microtime(true)) . '.' . end($temp[1]);
      $newfilename = md5(Time().$temp[0]).".".$temp[1];

    //   if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      if(move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], "uploads/" . $newfilename)) {
        echo "The file ".  basename( $_FILES['uploaded_file']['tmp_name']). 
        " has been uploaded";
      } else{
          echo "There was an error uploading the file, please try again!";
      }
    }
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email ID";
    }
    // if(strlen($password) < 6) {
    //     $password_error = "Password must be minimum of 6 characters";
    // }       
    if(strlen($mobile) < 10) {
        $mobile_error = "Mobile number must be minimum of 10 characters";
    }
    // if($password != $cpassword) {
    //     $cpassword_error = "Password and Confirm Password doesn't match";
    // }
    // $mobile="09195169442";
    $password="12345";
    $tahsilat="teacher";
    $drone="teacher";
    $drone="teacher";
    $drone_1="teacher";
    $birthday="teacher";
    $lastname="teacher";
    if (!$error) {
        if(mysqli_query($conn, "INSERT INTO user(name, email,mobile ,password,image,lastname,birthday,drone_1,drone,tahsilat,	timestamp) 
        VALUES('" . $name . "', '" . $email . "', '" . $mobile . "'
        , '" . md5($password) . "','".$newfilename."','".$lastname."','".$birthday."','".$drone_1."','".$drone."','".$tahsilat."','".Time()."')")) {
         header("location: login.php");
         exit();
        } else {
           echo "Error: " . $sql . "" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}

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
            </br>
            </br>
            </br>
		<!-- Wrapper -->
			<div id="wrapper">


				<!-- Main -->
					<div id="main">

       

				<!-- Teacher Section -->
                <section id="first" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2><?php echo constant('first_title'); ?></h2>
                                            <!-- <span class="image"><img src="images/img_teacher_section.jpeg" alt="" /></span> -->
                                            
										</header>
										<p class="centerAlign"><?php echo constant('first_body');?></p>
                                        <p class="bordertagp" ><?php echo constant('second_body_teacher');?></p>
										<p class="bordertagp"><?php echo constant('second_body_teacher_2');?></p>
										<p class="centerAlign"><?php echo constant('second_body_teacher_3');?></p>
										<p><?php echo constant('second_body_teacher_4-2');?></p>
										<p><?php echo constant('second_body_teacher_5');?></p>
										<p><?php echo constant('second_body_teacher_7');?></p>
										<p><?php echo constant('second_body_teacher_8');?></p>
										<p><?php echo constant('second_body_teacher_9');?></p>
										<p><?php echo constant('second_body_teacher_9-5');?></p>
										<p><?php echo constant('second_body_teacher_9-6');?></p>
										<p><?php echo constant('second_body_teacher_9-7');?></p>
										<p><?php echo constant('second_body_teacher_9-8');?></p>
										<p><?php echo constant('second_body_teacher_9-9');?></p>
										<p><?php echo constant('second_body_teacher_9-10');?></p>
										<p class ="leftalign"><?php echo constant(nl2br('second_body_teacher_9-11',true));?></p>
									</div>
									<span class="image"><img src="images/pic01.jpg" alt="" /></span>
								</div>
				

                                <form method="post" action="" name="signin-form" enctype="multipart/form-data">
                            <div >
                                <label>*Name</label>
                                <input type="text" name="name"  value="" maxlength="50" required="" />
                            </div>
                            <div >
                                <label>*Email</label>
                                <input type="email" name="email"  value="" maxlength="30" required="">
                                <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                            </div>

                            <div >
                                <label>*Mobile</label>
                                <input type="text" name="mobile"  value="" maxlength="12" required="">
                                <span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
                            </div>

                            <div >
                                <label>*CV Upload</label>
                                <input type="file" name="uploaded_file"   required="">
                                <span class="text-danger"></span>
                            </div>
                            </br>
                            </br>

                            <div  >
                                <input type="submit" id="search" class="submit" name="signup" value="submit">
                            </div>
                                </form>
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