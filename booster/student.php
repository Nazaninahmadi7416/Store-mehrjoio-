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

    $name =  @$_POST['name'];

    $lastname =  @$_POST['lastname'];

    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);

    // $drone_1 = mysqli_real_escape_string($conn, $_POST['drone_1']);

    $drone_1 = @$_POST['drone_1'];

    $drone =  @$_POST['drone'];

    $tahsilat = @$_POST['tahsilat'];

    // print_r(@$name);
    // echo $name;
    // die();

    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

    // $password = mysqli_real_escape_string($conn, $_POST['password']);

    // $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']); 

    // echo 'lastname'.$drone_1;

    // die();

    // if(!empty($_FILES['uploaded_file']))

    // {

    //   $path = "uploads/";

    //   $path = $path . basename( $_FILES['uploaded_file']['tmp_name']);

    //   $temp = explode(".", $_FILES["uploaded_file"]["name"]);

    // //   $newfilename = round(microtime(true)) . '.' . end($temp[1]);

    //   $newfilename = md5(Time().$temp[0]).".".$temp[1];



    //   if(move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], "uploads/" . $newfilename)) {

    //     echo "The file ".  basename( $_FILES['uploaded_file']['tmp_name']). 

    //     " has been uploaded";

    //   } else{

    //       echo "There was an error uploading the file, please try again!";

    //   }

    // }

    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {

        $name_error = "Name must contain only alphabets and space";

    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {

        $email_error = "Please Enter Valid Email ID";

    }



    if(strlen($drone)==0){

        $error=true;

        $message = "Invalid  My preference";

        

        echo "<script type='text/javascript'>alert('$message');</script>";

    }



    if(strlen($drone_1)==0){

        $error=true;

        $message = "Invalid  I want";

        echo "<script type='text/javascript'>alert('$message');</script>";

        

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

        // print_r(@$name);
    // echo $name;
    // die();

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

		<!-- <meta charset="utf-8" /> -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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



       



						<!-- Introduction -->

							<section id="intro" class="main">

								<div class="spotlight">

									<div class="content">

										<header class="major">

											<h2 class="<?php echo constant('direction_'); ?>"><?php echo constant('intro_title'); ?></h2>

										</header>

										<p class="<?php echo constant('direction_'); ?>"><?php echo constant('intro_body');?></p>



									</div>

									<span class="image"><img src="images/pic0111.jpg" alt="" /></span>

								</div>



                                <form method="post" action="" name="signin-form" enctype="multipart/form-data">

                            <div >

                                <label class="<?php echo constant('direction_'); ?>"><?php echo constant('name_input'); ?></label>

                                <input type="text" name="name"  value="" maxlength="50" required="" />

                            </div>

                            <div >

                                <label class="<?php echo constant('direction_'); ?>"><?php echo constant('lastname_input'); ?></label>

                                <input type="text" name="lastname"  value="" maxlength="400" required="" />

                            </div>

                            <div >

                                <label class="<?php echo constant('direction_'); ?>"><?php echo constant('birthday_input'); ?></label>

                                <!-- <input type="date" name="birthday"    value="1940-02-20" min="2022-02-20" max="2032-02-20"  value=""  required="" /> -->

                                <!-- <input type="text" name="birthday" placeholder="YYYY-MM-DD" required pattern="(?:19|20)\[0-9\]{2}-(?:(?:0\[1-9\]|1\[0-2\])/(?:0\[1-9\]|1\[0-9\]|2\[0-9\])|(?:(?!02)(?:0\[1-9\]|1\[0-2\])/(?:30))|(?:(?:0\[13578\]|1\[02\])-31))" title="Enter a date in this format YYYY/MM/DD"/> -->

                                <!-- <input type="text" name="birthday" placeholder="YYYY/MM/DD" pattern="\d{4}/\d{1,2}/\d{1,2}" class="datepicker" name="date" value="" /> -->

                                <input type="text" name="birthday"   value="" />



                            </div>

                            <div >

                                </br>

                                <label class="<?php echo constant('direction_'); ?>"><?php echo constant('tarjih_input'); ?></label>



                                    <div class="<?php echo constant('direction_'); ?>">

                                    <input type="radio" id="value_3" name="drone_1" value="tahsilat_value1"  >

                                    <label for="value_3" ><?php echo constant('tahsilat_value1'); ?></label>

                                    </div>



                                    <div class="<?php echo constant('direction_'); ?>">

                                    <input type="radio" id="value_4" name="drone_1" value="tahsilat_value2">

                                    <label for="value_4" ><?php echo constant('tahsilat_value2'); ?></label>

                                </div>

                            </div>



                    <!-- /** The language */ -->

                            <div >

                                </br>

                                <label class="<?php echo constant('direction_'); ?>"><?php echo constant('the_language_input'); ?></label>



                                    <div class="<?php echo constant('direction_'); ?>">

                                    <input type="radio" id="value_1" name="drone" value="the_language_value1"  >

                                    <label for="value_1" ><?php echo constant('the_language_value1'); ?></label>

                                    </div>



                                    <div class="<?php echo constant('direction_'); ?>">

                                    <input type="radio" id="value_2" name="drone" value="the_language_value2" >

                                    <label for="value_2" ><?php echo constant('the_language_value2'); ?></label>



                                </div>

                            </div>





                            <div >

                                <label class="<?php echo constant('direction_'); ?>"><?php echo constant('tahsilat_input'); ?></label>

                                <input type="text" name="tahsilat"  value="" maxlength="500" required="" />

                            </div>

                            <div >

                                <label class="<?php echo constant('direction_'); ?>"><?php echo constant('email_input'); ?></label>

                                <input type="email" name="email"  value="" maxlength="30" required="">

                                <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>

                            </div>



                            <div >

                                <label class="<?php echo constant('direction_'); ?>"><?php echo constant('mobile_input'); ?></label>

                                <input type="text" name="mobile"  value="" maxlength="12" required="">

                                <span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>

                            </div>



                            <!-- <div >

                                <label>CV Upload</label>

                                <input type="file" name="uploaded_file"   required="">

                                <span class="text-danger"></span>

                            </div> -->

                            </br>

                            </br>



                            <div  class="<?php echo constant('direction_'); ?>">

                                <input type="submit" id="search" class="submit" name="signup" value="<?php echo constant('submit_btn'); ?>">

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