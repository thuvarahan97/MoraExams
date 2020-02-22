<?php
include_once("db_config.php");
include_once("features.php");
date_default_timezone_set("Asia/Colombo");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mora E-Tamils <?=$committeeYear?></title>
    <link rel="icon" href="images/icon.png" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="G.C.E. A/L Pilot Examination for Tamil and English Medium Students of Biological and Physical Science Streams, organized by Mora E-Tamils <?=$committeeYear?>, University of Moratuwa">
    <meta name="keywords" content="Mora, E-Tamils, <?=$year?>, G.C.E A/L, Advanced Level, Pilot Exam, Examination, Srilankan Tamil, University of Moratuwa, Engineering Faculty, Physics, Maths, Bio, Chemistry, ICT">
    <meta property="og:image" content="images/site_image.png">
    <meta property="og:title" content="Mora E-Tamils <?=$committeeYear?>">
    <meta property="og:description" content="G.C.E. A/L Pilot Examination for Tamil and English Medium Students of Biological and Physical Science Streams, organized by Mora E-Tamils <?=$committeeYear?>, University of Moratuwa">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.moraetamils.com">
    <meta property="og:site_name" content="Mora E-Tamils <?=$committeeYear?>">
    <meta property="fb:app_id" content="179409859537169">
    <meta property="fb:admins" content="100012130562615">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/fonticons.css">
    <link rel="stylesheet" href="fonts/stylesheet.css">
    <link rel="stylesheet" href="css/style_custom.css">
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/aos.js"></script>
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-3 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-5" style="width:150px"><a href="index.php"><img src="images/logo.png" width="100px"/></a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-center" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block m-0 p-0">
                
                <?php if (isset($header_results) && ($header_results == 1)): ?>
                    <li><a href="results.php"><i class="fa fa-graduation-cap"></i><br/>RESULTS</a></li>
                <?php endif; ?>
                
                <li><a href="index.php"><i class="fa fa-home"></i><br/>HOME</a></li>
                
                <?php if (isset($header_timetable) && ($header_timetable == 1)): ?>
                    <li><a href="timetable.php"><i class="fa fa-calendar"></i><br/>TIME TABLE</a></li>
                <?php endif; ?>
                
                <?php if (isset($header_pastpapers) && ($header_pastpapers == 1)): ?>
                    <li><a href="pastpapers.php"><i class="fa fa-file-text"></i><br/>PAST PAPERS</a></li>
                <?php endif; ?>
                
                <?php if (isset($header_centres) && ($header_centres == 1)): ?>
                    <li><a href="districts_and_centres.php"><i class="fa fa-map-signs"></i><br/>CENTRES</a></li>
                <?php endif; ?>

              </ul>
            </nav>
          </div>

          <div class="ml-auto w-5">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">

                <?php if (isset($header_contact_us) && ($header_contact_us == 1)): ?>
                    <li class="cta"><a href="contact_us.php" class="nav-link"><span>CONTACT US</span></a></li>
                <?php endif; ?>

              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      </div>
      
    </header>