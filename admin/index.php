<?php
include_once("header.php");
include("assets/login.inc.php");

if(isset($_SESSION['user_id'])) {
    redirect("home.php");
}

$error_msg = "";
if(isset($_GET['error'])){
    $error_msg = $_GET['error'];
}
?>

<div class="intro-section" id="home-section">
    <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4">
                            <h1  data-aos="fade-up" data-aos-delay="100">Mora E-Tamils</h1>
                            <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Mora Exams Management Page</p>
                            <p data-aos="fade-up" data-aos-delay="300"><a href="register.php" class="btn btn-primary py-3 px-5 btn-pill">Register</a></p>

                        </div>

                        <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                            <form action="" method="post" class="form-box">
                                <h3 class="h4 text-black mb-4">Sign In</h3>

                                <?php if($error_msg!="") { ?>
                                    <div class="form-group">
                                        <?php
                                        if($error_msg==md5("username_password_error"))
                                        { ?>
                                            <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Incorrect Username or Password</label>
                                        <?php
                                        }
                                        else if($error_msg==md5("activation_error"))
                                        { ?>
                                            <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Your account is not activated yet!</label>
                                        <?php
                                        }
                                        else
                                        { ?>
                                            <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Could not Login to Account!</label>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php } ?>

                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username" autofocus="" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="login" class="btn btn-primary btn-pill" value="Login">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once("footer.php");
?>