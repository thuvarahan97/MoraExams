<?php
include_once("header.php");
include("assets/register.inc.php");

$error_msg = "";
if(isset($_GET['error'])){
    $error_msg = $_GET['error'];
}

$success_msg = "";
if(isset($_GET['success'])){
    $success_msg = $_GET['success'];
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
                            <p data-aos="fade-up" data-aos-delay="300"><a href="index.php" class="btn btn-primary py-3 px-5 btn-pill">Sign In</a></p>

                        </div>

                        <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                            <form action="" method="post" class="form-box">
                                <h3 class="h4 text-black mb-4">Sign Up</h3>

                                <?php if($error_msg!="") { ?>
                                    <div class="form-group">
                                        <?php
                                        if($error_msg==md5("username_error"))
                                        { ?>
                                            <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Username already exists!</label>
                                        <?php
                                        }
                                        else if($error_msg==md5("email_error"))
                                        { ?>
                                            <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Email address already exists!</label>
                                        <?php
                                        }
                                        else if($error_msg==md5("account_error"))
                                        { ?>
                                            <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Account already exists!</label>
                                        <?php
                                        }
                                        else if($error_msg==md5("password_error"))
                                        { ?>
                                            <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Passwords do not match!</label>
                                        <?php
                                        }
                                        else
                                        { ?>
                                            <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Could not register!</label>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php
                                } 
                                
                                else if($success_msg!="") { ?>
                                    <div class="form-group">
                                        <?php
                                        if($success_msg=="saved")
                                        { ?>
                                            <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Registered!</label>
                                        <?php
                                        } ?>
                                    </div>
                                <?php } ?>

                                <div class="form-group">
                                    <input type="text" name="firstname" value="<?php if(isset($_GET['firstname'])) {echo $_GET['firstname'];}?>" class="form-control" placeholder="First Name" autofocus="" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="lastname" value="<?php if(isset($_GET['lastname'])) {echo $_GET['lastname'];}?>" class="form-control" placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" value="<?php if(isset($_GET['username'])) {echo $_GET['username'];}?>" pattern="[A-Za-z0-9]{3,}" title="Three or more letter or number or composite" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="retype_password" class="form-control" placeholder="Re-type Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="<?php if(isset($_GET['email'])) {echo $_GET['email'];}?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" placeholder="Email Address" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="telephone" value="<?php if(isset($_GET['telephone'])) {echo $_GET['telephone'];}?>" pattern="[0-9]{10}" maxlength="10" class="form-control" placeholder="Contact No." required>
                                </div>
                                <div class="form-group">
                                    <?php
                                    $district_option = array(
                                        'Ampara' => 'Ampara',
                                        'Anuradhapura' => 'Anuradhapura',
                                        'Badulla' => 'Badulla',
                                        'Batticaloa' => 'Batticaloa',
                                        'Colombo' => 'Colombo',
                                        'Galle' => 'Galle',
                                        'Gampaha' => 'Gampaha',
                                        'Hambantota' => 'Hambantota',
                                        'Jaffna' => 'Jaffna',
                                        'Kalutara' => 'Kalutara',
                                        'Kandy' => 'Kandy',
                                        'Kegalle' => 'Kegalle',
                                        'Kilinochchi' => 'Kilinochchi',
                                        'Kurunegala' => 'Kurunegala',
                                        'Mannar' => 'Mannar',
                                        'Matale' => 'Matale',
                                        'Matara' => 'Matara',
                                        'Monaragala' => 'Monaragala',
                                        'Mullaitivu' => 'Mullaitivu',
                                        'Nuwara-Eliya' => 'Nuwara-Eliya',
                                        'Polonnaruwa' => 'Polonnaruwa',
                                        'Puttalam' => 'Puttalam',
                                        'Ratnapura' => 'Ratnapura',
                                        'Trincomalee' => 'Trincomalee',
                                        'Vavuniya' => 'Vavuniya'
                                    );
                                    ?>
                                    <select type="text" name="district" class="form-control" required>
                                        <?php foreach($district_option as $var => $district_name) { ?>
                                            <option 
                                                <?php 
                                                if(isset($_GET['district']) && ($var == $_GET['district'])) {
                                                    echo "selected";
                                                }else if(!isset($_GET['district']) && ($district_name == "Jaffna")) {
                                                    echo "selected";
                                                }?>>
                                                <?php echo $district_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="register" class="btn btn-primary btn-pill" value="Register">
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