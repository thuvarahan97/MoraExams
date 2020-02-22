<?php
ob_start();
session_start();
include_once("db_config.php");
date_default_timezone_set("Asia/Colombo");

$sql_districts = "SELECT * FROM tbl_exam_districts ORDER BY district ASC";
$result_districts = mysqli_query($db, $sql_districts);
$total_districts = mysqli_num_rows($result_districts);

$sql_centres = "SELECT * FROM tbl_exam_centres";
$result_centres = mysqli_query($db, $sql_centres);
$total_centres = mysqli_num_rows($result_centres);

$sql_students = "SELECT * FROM tbl_students";
$result_students = mysqli_query($db, $sql_students);
$total_students = mysqli_num_rows($result_students);

$sql_users = "SELECT * FROM tbl_users";
$result_users = mysqli_query($db, $sql_users);
$total_users = mysqli_num_rows($result_users);

$district_option = array(
  '1' => 'Ampara',
  '2' => 'Anuradhapura',
  '3' => 'Badulla',
  '4' => 'Batticaloa',
  '5' => 'Colombo',
  '6' => 'Galle',
  '7' => 'Gampaha',
  '8' => 'Hambantota',
  '9' => 'Jaffna',
  '10' => 'Kalutara',
  '11' => 'Kandy',
  '12' => 'Kegalle',
  '13' => 'Kilinochchi',
  '14' => 'Kurunegala',
  '15' => 'Mannar',
  '16' => 'Matale',
  '17' => 'Matara',
  '18' => 'Monaragala',
  '19' => 'Mullaitivu',
  '20' => 'Nuwara-Eliya',
  '21' => 'Polonnaruwa',
  '22' => 'Puttalam',
  '23' => 'Ratnapura',
  '24' => 'Trincomalee',
  '25' => 'Vavuniya'
);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mora Exams Management System &mdash; Mora E-Tamils</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/style_custom.css?v=<?php echo time();?>">
    
    <script src="js/jquery-3.3.1.min.js"></script>
    
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
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-5"><a href="index.php">MORA EXAMS</a></div>

          <?php if(isset($_SESSION["user_id"])){ ?>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="home.php" class="nav-link">Home</a></li>
                <li><a href="districts_and_centres.php" class="nav-link">Districts & Centres</a></li>
                <li><a href="subjects.php" class="nav-link">Subjects</a></li>
                <li><a href="students.php" class="nav-link">Students</a></li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Marks</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="marks.php?subject=09">Biology</a>
                    <a class="dropdown-item" href="marks.php?subject=10">Combined Mathematics</a>
                    <a class="dropdown-item" href="marks.php?subject=01">Physics</a>
                    <a class="dropdown-item" href="marks.php?subject=02">Chemistry</a>
                    <a class="dropdown-item" href="marks.php?subject=20">ICT</a>
                    <?php if($_SESSION['user_status']=='2') { ?>
                      <a class="dropdown-item" href="marks.view_all.php">View All Marks</a>
                    <?php } ?>
                  </div>
                </li>
                <li><a href="transactions.php" class="nav-link">Transactions</a></li>
                <li><a href="users.php" class="nav-link">Users</a></li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-5">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="logout.php" class="nav-link"><span>Logout</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>

          <?php } ?>

        </div>
      </div>
      
    </header>

    <?php
    function redirect($url){
        if (headers_sent()){
            die('<script type="text/javascript">window.location.href=' . $url . '</script>');
        }else{
            header('Location: ' . $url);
            die();
        }
    }

    function getUserIpAddress(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    ?>