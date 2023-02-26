<?php
  require_once "db.php";

  if(isset($_SESSION['user_id'])!="") {
    header("Location: dashboard.php");
  }

    if (isset($_POST['signup'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        // $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
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
        if (!$error) {
            if(mysqli_query($conn, "INSERT INTO user(name, email,mobile ,password,image) 
            VALUES('" . $name . "', '" . $email . "', '" . $mobile . "', '" . md5($password) . "','".$newfilename."')")) {
             header("location: login.php");
             exit();
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            margin: 50px auto;
            text-align: center;
            width: 800px;
        }
        h1 {
            font-family: 'Passion One';
            font-size: 2rem;
            text-transform: uppercase;
        }
        label {
            width: 150px;
            display: inline-block;
            text-align: left;
            font-size: 1.5rem;
            font-family: 'Lato';
        }
        input {
            border: 2px solid #ccc;
            font-size: 1.5rem;
            font-weight: 100;
            font-family: 'Lato';
            padding: 10px;
        }
        #btn {
            padding: 10px;
            font-size: 2.5rem;
            font-family: 'Lato';
            font-weight: 100;
            background: yellowgreen;
            color: white;
            border: none;
        }
        form {
            margin: 5px auto;
            padding: 6px;
            border: 5px solid #ccc;
            width: 100%;
            background: #eeeeee;
        }
        div.form-element {
            margin: 10px 0;
        }
        div.form-content {
            margin: 10px 0;
            text-align: justify;
            text-justify: inter-word;
            white-space: pre;
        }
        button {
            padding: 10px;
            font-size: 2.5rem;
            font-family: 'Lato';
            font-weight: 100;
            background: yellowgreen;
            color: white;
            border: none;
        }
   
   
        p.success,
        p.error {
            color: white;
            font-family: lato;
            background: yellowgreen;
            display: inline-block;
            padding: 2px 10px;
        }
        p.error {
            background: orangered;
        }
        #search {
         width: 20em;  height: 4em;
        }
        p{
            font-size: 20px;
        }
   </style>

</head>

<body>
<form method="post" action="" name="signin-form" enctype="multipart/form-data">

<div class="card text-white bg-primary mb-12" >
  
  <div class="card-body">
    <p class="card-text">
        Hello welcome to English Booster .
        There are a variety of different job opportunities for 
     teaching English online or face to face here</p>
  </div>
</div>
    </br>

<div class="card text-white bg-success mb-12">
  <div class="card-header"> 2 things to do before you apply for a English teaching job </div>
</div>
</br>

<div class="container">
  <div class="row align-items-center">
  <div class="card text-white bg-primary col-md-6">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>


<div class="card text-white bg-primary col-md-6">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
 
  </div>


</div>

</div>




 <div class="form-content">
     <h2>
     Hello welcome to English Booster .
     There are a variety 
     of different job opportunities for 
     teaching English online or face to face here

     2 things to do before you 
     apply for a English teaching job 
     1. Be fluent in English and 
     hold at least a bachelor’s degree

     There are a select number of online 
     English teaching companies that don’t 
     require a degree but for the most part, 
     you need proficient English language
      skills and a college degree 
      (which doesn’t have to be in education).

    2. Make a list of  English teaching job must-haves

    Before you start looking for  teaching position, 
    ask yourself:

    What do YOU really want from  English teaching
     job? For me, personally, it was the following
      three non-negotiables:

    A flexible  teaching schedule (without set hours)
    The freedom to travel while I worked
    Good pay!

    What do I need to teach English?
    1. TEFL certification
    TEFL certification is one of the most basic 
    requirements
    to teach English online—and the most important!
    You would never apply for a job as a dentist
    if you didn’t go to dental school, right? 
    The same rules apply in the field of 
    teaching English online and abroad.

    Employers aren’t just looking for fluent 
    English speakers,they also expect every
    teacher to be trained on things like 
    how to professionally run an online classroom
    and create engaging lesson plans and activities.

    2. Technology and device requirements

    Yes, you can teach English from
     anywhere in the world, but you 
     need to make sure you meet all 
     the essential technological 
     requirements to teach English online
     , like high-speed internet, a laptop or computer
      with a webcam, and a working headset 
      with a microphone.

    3/At least 2 years experience of teaching english 

    4)Confidence in your ability to teach 
    and the capacity to be a good role
    model even when you are tired and
    under pressure.
    5/Great organisational skills as teachers
    are often balancing many demands including
    pupil's needs, lesson preparation,
    assessments and discipline matters.
    6)Dedication, commitment and resilience.
    Excellent teachers reflect on their experiences
    and adapt their approach, constantly learning
    and improving.
    7/The ability to deal with conflict and be
    patient and calm in sometimes stressful
    situations.
    8/Integrity, which enables pupils, colleagues
    and parents/carers to be able to 
    trust you as a teacher.
    9/A good sense of humour.


     </h2>
 </div>


  <div class="form-element">
    <label>Name</label>
    <input type="text" name="name"  value="" maxlength="50" required="" />
  </div>
  <div class="form-element">
    <label>Email</label>
    <input type="email" name="email"  value="" maxlength="30" required="">
    <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
  </div>
  <div class="form-element">
     <label>Mobile</label>
     <input type="text" name="mobile"  value="" maxlength="12" required="">
     <span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
  </div>
  <div class="form-element">
     <label>CV Upload</label>
     <input type="file" name="uploaded_file"   required="">
     <span class="text-danger"></span>
  </div>
  <!-- <button type="submit" name="login" value="login">Log In</button> -->
  <div class="btn">
  <input type="submit" id="search" class="btn btn-primary btn-lg btn-block" name="signup" value="submit">
  </div>
</form>
</body>

<!-- <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                    <h2>Registration Form </h2>
                </div>
                <p>Please fill all fields in the form</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>

                    <div class="form-group ">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" class="form-control" value="" maxlength="12" required="">
                        <span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label>myfile</label>
                        <input type="file" name="uploaded_file" class="form-control"  required="">
                        <span class="text-danger"></span>
                    </div>
<!-- 
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>   -->

                    <!-- <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" value="" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div> -->

                    <!-- <input type="submit" class="btn btn-primary" name="signup" value="submit">
                    Already have a account?<a href="login.php" class="btn btn-default">Login</a> -->
                </form>
            </div>
        </div>    
    </div>
</body> 
</html>
