<?php 
include_once("config.php");
include_once("language-".PANEL_LANGUAGE.".php");

?><!DOCTYPE html>
<html lang="<?php echo PANEL_LANGUAGE?>">
    <head>
        <meta charset="utf-8">
        <title>
            <?php echo PAGE_LOGIN_TITLE ?>
        </title>
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link rel="stylesheet" media="screen, print" href="webfonts/css.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="img/favicon/fav.png" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="css/prime.css">
        <?php if(PANEL_LANGUAGE=='fa'){?>
            <link rel="stylesheet" media="screen, print" href="css/prime-rtl.css">
        <?php }?>
    </head>
    <body class="mod-bg-1">
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <div class="page-content-wrapper login-bg">

                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">

                    <div class="d-flex justify-content-center">


                    <div class="panel">
                                    <div class="panel-hdr login-page-title">
                                        <h2>
                                            <?php echo PAGE_LOGIN_TITLE ?>
                                        </h2>

                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content login-view">
                                            <form class="login-form">
                                            <div class="login-lable"><?php echo USERNAME?></div>
                                            <div><input name="username" type="text" class="form-control" required></div>
                                            <div class="login-lable"><?php echo PASSWORD?></div>
                                            <div><input name="password" type="password" class="form-control" required></div>
                                            <div><button type="submit" class="btn btn-info btn-lg btn-block waves-effect waves-themed bg-info-700"><?php echo LOGIN_BTN?></button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                    </div>

                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->

                    
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        <script src="js/prime-apps.js"></script>

    </body>
</html>
