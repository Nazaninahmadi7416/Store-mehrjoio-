<?php 

include_once("config.php");

include_once("language-".PANEL_LANGUAGE.".php");



?><!DOCTYPE html>

<html lang="<?php echo PANEL_LANGUAGE?>">

    <head>

        <meta charset="utf-8">

        <title>

        <?php echo PANEL_TITLE?>

        </title>

        <meta name="description" content="Analytics Dashboard">

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

        <link rel="stylesheet" media="screen, print" href="css/styles.css">

        <link rel="stylesheet" media="screen, print" href="css/prime.css">

        <link rel="stylesheet" href="css/chosen.css">



        <?php if(PANEL_LANGUAGE=='fa'){?>

            <link rel="stylesheet" media="screen, print" href="css/prime-rtl.css">

        <?php }?>

    </head>

    <body class="mod-bg-1" id="theme-rtl">

        <!-- BEGIN Page Wrapper -->

        <div class="page-wrapper">

            <div class="page-inner">

                <!-- BEGIN Left Aside -->

                <aside class="page-sidebar">



                    <!-- BEGIN PRIMARY NAVIGATION -->

                    <nav id="js-primary-nav" class="primary-nav" role="navigation">

                        <div class="info-card">

                            <img src="" class="profile-image rounded-circle admin-profile-image">

                            <div class="info-card-text">

                                <a href="#" class="d-flex align-items-center text-white">

                                    <span class="text-truncate text-truncate-sm d-inline-block admin-full-name">

                                        

                                    </span>

                                </a>

                                <span class="d-inline-block text-truncate text-truncate-sm admin-desc"></span>

                            </div>

                            <img src="" class="cover admin-background-image">

                        </div>

                        <ul id="js-nav-menu prime prime-panel-menu-ul" class="nav-menu">

                            <li class="prime prime-panel-menu-li portal-menu">

                                

                            </li>

                        </ul>

                        <div class="filter-message js-filter-message bg-success-600"></div>

                    </nav>

                    <!-- END PRIMARY NAVIGATION -->

                    <!-- NAV FOOTER -->

                    <div class="nav-footer shadow-top">

                        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">

                            <i class="ni ni-chevron-right"></i>

                            <i class="ni ni-chevron-right"></i>

                        </a>

                        <ul class="list-table m-auto nav-footer-buttons">

                            <li>

                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">

                                    <i class="fal fa-comments"></i>

                                </a>

                            </li>

                            <li>

                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">

                                    <i class="fal fa-life-ring"></i>

                                </a>

                            </li>

                            <li>

                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">

                                    <i class="fal fa-phone"></i>

                                </a>

                            </li>

                        </ul>

                    </div> <!-- END NAV FOOTER -->

                </aside>

                <!-- END Left Aside -->

                <div class="page-content-wrapper">



                    <!-- BEGIN Page Content -->

                    <!-- the #js-page-content id is needed for some plugins to initialize -->

                    <main id="js-page-content" role="main" class="page-content">

                        <div class="subheader">

                            <h1 class="subheader-title prime prime-panel-page-title">

                                

                            </h1>



                        </div>

                        <div class="row prime prime-panel-main-section">





                        <a href="#url#" class="col-xl-2 prime prime-grid-btn-panel  hidden-element" style="background-color:#color#">#title#</a>



                            <div class="col-xl-3 prime prime-grid-panel  hidden-element">

                                

                                <div class="panel">

                                    <div class="panel-hdr prime prime-panel-title">

                                        <h2>

                                            #title#

                                        </h2>

                                    </div>

                                    <div class="panel-container">

                                        <div class="panel-content prime prime-panel-content">

                                            #data#

                                        </div>



                                    </div>

                                </div>



                            </div>





                            <div class="col-xl-12 prime prime-list-panel hidden-element">

                                

                                <div class="panel">

                                    <div class="panel-hdr prime prime-panel-title">

                                        <h2>

                                            #title#

                                        </h2>

                                    </div>

                                    <div class="panel-container">

                                        <div class="panel-content prime prime-panel-content table-responsive-lg prime-table-div">

                                        <table class="table table-bordered m-0 prime-table">

                                                <thead>

                                                    <tr>



                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    

                                                </tbody>

                                            </table>

                                        </div>



                                    </div>

                                </div>



                            </div>





                            <div class="col-xl-12 prime prime-form-panel hidden-element">

                                

                                <div class="panel">

                                    <div class="panel-hdr prime prime-panel-title">

                                        <h2>

                                            #title#

                                        </h2>

                                    </div>

                                    <div class="panel-container">

                                        <div class="panel-content prime prime-panel-content prime-form-div">

                                        #form#

                                        </div>



                                    </div>

                                </div>



                            </div>



                        </div>

                    </main>

                    <!-- this overlay is activated only when mobile menu is triggered -->

                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->

                    <!-- BEGIN Page Footer -->

                    <footer class="page-footer" role="contentinfo">

                        <div class="d-flex align-items-center flex-1 text-muted">

                            <span class="hidden-md-down fw-700">تمامی حقوق برای iziapp محفوظ می باشد.&nbsp;<a href='https://www.iziapp.ir' class='text-primary fw-500' title='iziapp.ir' target='_blank'>iziapp.ir</a></span>

                        </div>

                        <div>

                            <ul class="list-table m-0">

                                <li class="pl-3"><a href="#" class="text-secondary fw-700">درباره iziapp</a></li>

                                <li class="pl-3"><a href="#" class="text-secondary fw-700">شرایط استفاده</a></li>

                                <li class="pl-3"><a href="#" class="text-secondary fw-700">پشتیبانی</a></li>

                                <li class="pl-3 fs-xl"><a href="#" class="text-secondary"><i class="fal fa-question-circle" aria-hidden="true"></i></a></li>

                            </ul>

                        </div>

                    </footer>

                    </div>

                </div>

            </div>

        </div>

        <!-- END Page Wrapper -->

        

        <div class='full-loader'><img src="img/loading.svg"></div>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">



        <script src="js/vendors.bundle.js"></script>

        <script src="js/app.bundle.js"></script>

        <!-- The order of scripts is irrelevant. Please check out the plugin pages for more details about these plugins below: -->

        <script src="js/dependency/moment/moment.js"></script>

        <script src="js/statistics/flot/flot.bundle.js"></script>

        <script src="js/miscellaneous/jqvmap/jqvmap.bundle.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<link href="css/editor.css" type="text/css" rel="stylesheet"/>

		<script src="css/editor.js"></script>



        <script src="js/prime-apps.js"></script>

        <script src="js/chosen.jquery.js" type="text/javascript"></script>



        <script>



        $('.page-wrapper').addClass('blur-body');

        $('.full-loader').css('display', 'block');



        $( document ).ready(function() {

            setTimeout(function(){

                loaderInit();

                loadMenu();

            },10);

        });

        </script>



    </body>



</html>

