<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Tech4">
    <meta name="keywords" content="tech4">
    <meta name="author" content="Tobilola">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SITE TITLE -->
    <title>tech4</title>

    <!-- =========================
  FAV AND TOUCH ICONS (RETINA)
  ============================== -->
    <link rel="icon" href="<?= base_url('assets/images/favicon.ico');?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/images/apple-touch-icon.png');?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('assets/images/apple-touch-icon-72x72.png');?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('assets/images/apple-touch-icon-114x114.png');?>">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="apple-icon-57x57.png');?>" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-icon-144x144.png');?>" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="apple-icon-120x120.png');?>" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="apple-icon-152x152.png');?>" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon-32x32.png');?>" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon-16x16.png');?>" sizes="16x16" />
    <meta name="msapplication-TileImage" content="ms-icon-144x144.png');?>" />

    <!-- =========================
  STYLESHEETS
  ============================== -->
    <!-- BOOTSTRAP -->
    
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>">

    <!-- FONT ICONS -->
    <link rel="stylesheet" href="<?= base_url('assets/template/elegant-icons/style.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/template/et-line-font/style.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/template/fonts/font-awesome.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/template/ion-icon/ionicons.min.css');?>">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/template/app-icons/styles.css');?>"> -->
    <!--[if lte IE 7]><script src="lte-ie7.js');?>"></script><![endif]-->

    <!-- CAROUSEL AND LIGHTBOX -->
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.theme.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tech4-lightbox.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tech4_themes/default/default.css');?>">

    <!-- ANIMATIONS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.min.css');?>">
    <!-- MAIN STYLESHEETS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css');?>">

    <!-- COLORS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/color-schemes/royal-blue.css');?>">

    <!-- RESPONSIVE FIXES -->
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css');?>">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    
    <script src="<?= base_url('assets/js/jquery.min.js');?>"></script>
    
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <!--[if lt IE 9]>
  <script src="<?= base_url('assets/js/html5shiv.js');?>"></script>
  <script src="<?= base_url('assets/js/respond.min.js');?>"></script>
  <![endif]-->

</head>

<body>
    <!-- =========================
  HEADER
  ============================== -->

    <header class="header" id="home">
        <!-- HEADER COLOR OVER IMAGE -->

        <div class="navbar bs-docs-nav navbar-fixed-top sticky-navigation">
            <div class="container">
                <div class="navbar-header">

                    <!-- LOGO ON STICKY NAV BAR -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#">
                        <!-- <img src="<?= base_url('assets/images/logo.png');?>" alt="logo" /> -->
                        <div class="logo-title">tech4</div>
                    </a>

                </div>

                <!-- NAVIGATION LINKS -->
                <div class="navbar-collapse collapse" id="navigation">
                    <ul class="nav navbar-nav navbar-right main-navigation">
                        <li><a href="#home">home</a></li>
                        <?php if(isset($not_login)){?>
                          <li><a href="#" class="login_button">Login</a></li>
                          <li><a href="#" class="register_button">Register</a></li>
                        <?php }else{ ?>
                          <li><a href="#order">order technologies</a></li>
                           
						  <li><a href="#order">rating</a></li>
                          <li><a href="#faq">FAQ</a></li>
                          <li><a id="logout" href="#"> <?= $_SESSION['user_name']; ?> (<span style="color:red">logout</span>)</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <!--END NAVIGATION LINKS -->
            </div>
            <!-- /END CONTAINER -->
        </div>
        <!-- /END STICKY NAVIGATION -->

        <section class="slider-section parallax-bg" data-parallax="scroll" data-image-src="<?= base_url('assets/images/tech4/bg-1.jpg');?>">
            <div class="banner-grid">
                <div class="bx-caption">

                    <div id="top" class="">

                        <div class="banner-info">
                            <h3>tech4</h3>
                            <p>Productive Tech for Work System</p>
                        </div>

                    </div>
                </div>
            </div>
            
        </section>
    </header>
    <!-- /END HEADER -->