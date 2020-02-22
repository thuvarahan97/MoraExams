<?php
include_once("header.php");
include("assets/district.add.inc.php");
if(!isset($_SESSION["user_id"])){
    redirect("index.php");
}

if($_SESSION['user_status']!='2'){
    redirect("districts_and_centres.php");
}

$error_msg = "";
if(isset($_GET['error'])){
    $error_msg = $_GET['error'];
}

$success_msg = "";
if(isset($_GET['success'])){
    $success_msg = $_GET['success'];
}

include_once("districts_and_centres.banner.php");
?>

<div class="site-section">
    <div class="container">

        <div class="justify-content-center align-items-center">
            <div class="col-lg-8 mx-auto" data-aos="fade-up" data-aos-delay="500">
                <form action="" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4 text-center">Add New District</h3>

                    <?php if($error_msg!="") { ?>
                        <div class="form-group">
                            <?php
                            if($error_msg==md5("already_exists_error"))
                            { ?>
                                <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">District already exists!</label>
                            <?php
                            }
                            else
                            { ?>
                                <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Unable to add the district!</label>
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
                                <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Added!</label>
                            <?php
                            } ?>
                        </div>
                    <?php 
                    }
                    
                    else { ?>
                        <br/>
                    <?php } ?>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">District :</label>
                        <div class="col-sm-9">
                            <select type="text" name="district_id" class="form-control" autofocus="" required>
                                <?php foreach($district_option as $dist_id => $dist_name) { ?>
                                    <option value = "<?php echo $dist_id ?>">
                                        <?php echo $dist_name; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Coordinator :</label>
                        <div class="col-sm-9">
                            <input type="text" name="coordinator" class="form-control" placeholder="Coordinator's Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Contact No. :</label>
                        <div class="col-sm-9">
                            <input type="text" name="telephone" pattern="[0-9]{10}" maxlength="10" class="form-control" placeholder="0xxxxxxxxx">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Examination Fee :</label>
                        <div class="col-sm-9">
                            <input type="number" name="form_cost" min="0" max="1000" class="form-control" placeholder="Rs. xxx.xx" required>
                        </div>
                    </div>

                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="add" class="btn btn-primary btn-pill" value="Add">
                        <button type="button" name="cancel" onclick="location.href='districts_and_centres.php'" class="btn btn-secondary btn-pill">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>

<?php
include_once("footer.php");
?>