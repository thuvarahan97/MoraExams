<?php
include_once("header.php");
include("assets/centre.add.inc.php");
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
            <div class="col-lg-7 mx-auto" data-aos="fade-up" data-aos-delay="500">
                <form action="" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4 text-center">Add New Centre</h3>

                    <?php if($error_msg!="") { ?>
                        <div class="form-group">
                            <?php
                            if($error_msg==md5("already_exists_error"))
                            { ?>
                                <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Centre already exists!</label>
                            <?php
                            }
                            else
                            { ?>
                                <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Unable to add the centre!</label>
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
                            <select type="text" name="district_id" class="form-control" required>
                                <?php
                                if ($total_districts > 0) {
                                    while($row_district = mysqli_fetch_assoc($result_districts)) {
                                    ?>
                                    <option
                                        value = "<?php echo $row_district['district_id'] ?>" 
                                        <?php 
                                        if(isset($_GET['district_id']) && ($row_district['district_id'] == $_GET['district_id'])) {
                                            echo "selected";
                                        }?>>
                                        <?php echo $row_district['district'] ?>
                                    </option>
                                    <?php } } else { ?>
                                        <option disabled selected>No districts found.</option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Centre :</label>
                        <div class="col-sm-9">
                            <input type="text" name="centre" value="<?php if(isset($_GET['centre'])) {echo $_GET['centre'];}?>" class="form-control" placeholder="Name of Centre" autofocus="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Place :</label>
                        <div class="col-sm-9">
                            <input type="text" name="place" value="<?php if(isset($_GET['place'])) {echo $_GET['place'];}?>" class="form-control" placeholder="Location of Centre" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Gender :</label>
                        <div class="col-sm-9">
                            <?php
                            $gender_option = array(
                                'Mixed' => 'Mixed',
                                'Male' => 'Male',
                                'Female' => 'Female'
                            );
                            ?>
                            <select type="text" name="gender" class="form-control" required>
                                <?php foreach($gender_option as $var => $gender_name) { ?>
                                    <option 
                                        <?php 
                                        if(isset($_GET['gender']) && ($var == $_GET['gender'])) {
                                            echo "selected";
                                        }?>>
                                        <?php echo $gender_name; ?>
                                    </option>
                                    <?php } ?>
                            </select>
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