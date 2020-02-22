<?php
include_once("header.php");
include("assets/student.edit.inc.php");
if(!isset($_SESSION["user_id"])){
    redirect("index.php");
}

$error_msg = "";
if(isset($_GET['error'])){
    $error_msg = $_GET['error'];
}

$success_msg = "";
if(isset($_GET['success'])){
    $success_msg = $_GET['success'];
}

include_once("students.banner.php");
?>

<div class="site-section">
    <div class="container">

        <div class="justify-content-center align-items-center">
            <div class="col-lg-8 mx-auto" data-aos="fade-up" data-aos-delay="500">
                <form action="" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4 text-center">Update Student's Details</h3>

                    <?php if($error_msg!="") { ?>
                        <div class="form-group">
                            <?php
                            if($error_msg==md5("already_exists_error"))
                            { ?>
                                <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Index No. already exists!</label>
                            <?php
                            }
                            else
                            { ?>
                                <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Failed to update the student's details!</label>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    } 
                    
                    else if($success_msg!="") { ?>
                        <div class="form-group">
                            <?php
                            if($success_msg=="updated")
                            { ?>
                                <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Updated!</label>
                            <?php
                            } ?>
                        </div>
                    <?php 
                    }
                    
                    else { ?>
                        <br/>
                    <?php } ?>
                    

                    <input type="text" name="index_no" value="<?php echo $row['index_no']; ?>" class="form-control" style="display: none;">

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Index No. :</label>
                        <div class="col-sm-8">
                            <input type="text" name="index_no_new" value="<?php echo $row['index_no']; ?>" maxlength="6" minlength="6" class="form-control" placeholder="Index No." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Student's Name :</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Full Name / Name with Initials" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Stream & Subjects :</label>
                        <div class="col-sm-8">
                            <select type="text" name="subject_group_id" class="form-control" required>
                                <?php 
                                $sql_subjects = "SELECT A.*, B.stream FROM tbl_subjects A, tbl_streams B WHERE A.stream_id = B.stream_id ORDER BY A.subject_group_id ASC";
                                $result_subjects = mysqli_query($db, $sql_subjects);
                                if(mysqli_num_rows($result_subjects)>0){
                                    while($row_subjects = mysqli_fetch_assoc($result_subjects)){ ?>
                                        <option value = "<?php echo $row_subjects['subject_group_id'] ?>" <?php if ($row_subjects['subject_group_id'] == $row['subject_group_id']) { echo "selected"; } ?>>
                                            <?php echo $row_subjects['stream']." - ".$row_subjects['subject1_name']." | ".$row_subjects['subject2_name']." | ".$row_subjects['subject3_name'] ?>
                                        </option>
                                <?php } } else { ?>
                                    <option disabled selected>No subject groups available.</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Syllabus :</label>
                        <div class="col-sm-8">
                            <select type="text" name="syllabus" class="form-control" required>
                                <option value="Common" <?php if ("Common" == $row['syllabus']) { echo "selected"; } ?>>Common Syllabus</option>
                                <option value="Old" <?php if ("Old" == $row['syllabus']) { echo "selected"; } ?>>Old Syllabus</option>
                                <option value="New" <?php if ("New" == $row['syllabus']) { echo "selected"; } ?>>New Syllabus</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Medium :</label>
                        <div class="col-sm-8">
                            <select type="text" name="medium" class="form-control" required>
                                <option value="Tamil" <?php if ("Tamil" == $row['medium']) { echo "selected"; } ?>>Tamil Medium</option>
                                <option value="English" <?php if ("English" == $row['medium']) { echo "selected"; } ?>>English Medium</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">District (for Ranking) :</label>
                        <div class="col-sm-8">
                            <select type="text" name="district_id_ranking" class="form-control" required>
                                <?php foreach($district_option as $dist_id => $dist_name) { ?>
                                    <option value = "<?php echo $dist_id ?>" <?php if ($dist_id == $row['district_id_ranking']) { echo "selected"; } ?>>
                                        <?php echo $dist_name; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">District (for Sitting) :</label>
                        <div class="col-sm-8">
                            <select type="text" name="district_id_sitting" class="form-control" required>
                                <?php
                                if ($total_districts > 0) {
                                    while($row_districts = mysqli_fetch_assoc($result_districts)) {
                                    ?>
                                    <option value = "<?php echo $row_districts['district_id'] ?>" <?php if ($row_districts['district_id'] == $row['district_id_sitting']) { echo "selected"; } ?>>
                                        <?php echo $row_districts['district'] ?>
                                    </option>
                                    <?php } } else { ?>
                                        <option disabled selected>No examination districts available.</option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Centre :</label>
                        <div class="col-sm-8">
                            <select type="text" name="centre_id" class="form-control" required>
                                <?php 
                                $sql_centres = "SELECT * FROM tbl_exam_centres ORDER BY district_id ASC";
                                $result_centres = mysqli_query($db, $sql_centres);
                                if(mysqli_num_rows($result_centres)>0){
                                    while($row_centres = mysqli_fetch_assoc($result_centres)){ ?>
                                        <option value = "<?php echo $row_centres['centre_id'] ?>" <?php if ($row_centres['centre_id'] == $row['centre_id']) { echo "selected"; } ?>>
                                            <?php echo $row_centres['centre_name'] ?>
                                        </option>
                                <?php } } else { ?>
                                    <option disabled selected>No examination centres available.</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">N.I.C No. :</label>
                        <div class="col-sm-8">
                            <input type="text" name="nic" value="<?php echo $row['nic']; ?>" maxlength="12" class="form-control" placeholder="xxxxxxxxxxxV">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Gender :</label>
                        <div class="col-sm-8">
                            <?php
                            $gender_option = array(
                                'Male' => 'Male',
                                'Female' => 'Female'
                            );
                            ?>
                            <select type="text" name="gender" class="form-control" required>
                                <?php foreach($gender_option as $var => $gender_name) { ?>
                                    <option value="<?php echo $var ?>" <?php if ($var == $row['gender']) { echo "selected"; } ?>>
                                        <?php echo $gender_name; ?>
                                    </option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">School :</label>
                        <div class="col-sm-8">
                            <input type="text" name="school" value="<?php echo $row['school']; ?>" class="form-control" placeholder="School">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Address :</label>
                        <div class="col-sm-8">
                            <textarea name="address" class="form-control" rows="2"><?php echo $row['address']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">E-mail Address :</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" value="<?php echo $row['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" placeholder="E-mail Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Telephone No. :</label>
                        <div class="col-sm-8">
                            <input type="text" name="telephone" value="<?php echo $row['telephone']; ?>" pattern="[0-9]{10}" maxlength="10" class="form-control" placeholder="0xxxxxxxxx">
                        </div>
                    </div>

                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="update" class="btn btn-primary btn-pill" value="Update">
                        <button type="button" name="cancel" onclick="location.href='students.php'" class="btn btn-secondary btn-pill">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>

<?php
include_once("footer.php");
?>