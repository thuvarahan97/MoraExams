<?php
include_once("header.php");
include("assets/student.details.inc.php");
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
                <form action="" method="post" class="form-box" style="padding-bottom: 0">
                    <h3 class="h4 text-black mb-4 text-center">Check Student's Details</h3>
                    <br/>
                    <div class="form-group row">
                        <div class="col-md-9">
                            <input type="text" name="index_no" value="<?php if(isset($_GET['index_no'])){echo $_GET['index_no'];} ?>" maxlength="6" minlength="6" class="form-control" placeholder="Index No." autofocus="" required>
                        </div>
                        <div class="col-md-3">
                            <input style="width:100%" type="submit" name="view" class="btn btn-primary" value="View">
                        </div>
                    </div>
                </form>
                    
                <?php if($error_msg!="") { ?>
                    <div class="form-group">
                        <?php
                        if($error_msg==md5("not_found_error"))
                        { ?>
                            <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Index No. is Not Found!</label>
                        <?php
                        }
                        else if($error_msg==md5("check_failed"))
                        { ?>
                            <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Failed to check!</label>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                } 
                
                else if($success_msg!="") { ?>
                    <div class="form-group">
                        <?php
                        if($success_msg=="checked")
                        { ?>
                            <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Checked!</label>
                        <?php
                        } ?>
                    </div>
                <?php 
                }
                
                else if(isset($_GET['index_no']) && $total==1) { ?>
                    <div class="form-group">
                        <?php 
                        if($row['checked']==1) { ?>
                            <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Already Checked!</label>
                        <?php 
                        } else if($row['checked']==0) { ?>
                            <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Not Checked Yet!</label>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                
                <br/>
                
                <?php } ?>

                <div class="form-box" style="padding-top: 0;">
                    <?php if(isset($_GET['index_no']) && $total==1) { ?>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Student's Name :</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['name']; ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Stream & Subjects :</label>
                        <div class="col-sm-8">
                            <?php 
                            $sql_subjects = "SELECT A.*, B.stream FROM tbl_subjects A, tbl_streams B WHERE A.stream_id = B.stream_id AND A.subject_group_id = '{$row['subject_group_id']}'";
                            $result_subjects = mysqli_query($db, $sql_subjects);
                            if(mysqli_num_rows($result_subjects)>0){
                                $row_subjects = mysqli_fetch_assoc($result_subjects); ?>
                                <input value="<?php echo $row_subjects['stream']." - ".$row_subjects['subject1_name']." | ".$row_subjects['subject2_name']." | ".$row_subjects['subject3_name']; ?>" class="form-control" disabled>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Syllabus :</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['syllabus'].' Syllabus'; ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Medium :</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['medium']; ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">District (for Ranking) :</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['district_ranking']; ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">District (for Sitting) :</label>
                        <div class="col-sm-8">
                            <?php
                            if ($total_districts > 0) {
                                while($row_districts = mysqli_fetch_assoc($result_districts)) {
                                    if ($row_districts['district_id'] == $row['district_id_sitting']) { ?>                
                                        <input value="<?php echo $row_districts['district']; ?>" class="form-control" disabled>
                                    <?php } ?>
                            <?php } } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Centre :</label>
                        <div class="col-sm-8">
                            <?php 
                            $sql_centres = "SELECT * FROM tbl_exam_centres WHERE centre_id = '{$row['centre_id']}'";
                            $result_centres = mysqli_query($db, $sql_centres);
                            if(mysqli_num_rows($result_centres)>0){
                                $row_centres = mysqli_fetch_assoc($result_centres) ?>
                                <input value="<?php echo $row_centres['centre_name'].' - '.$row_centres['place']; ?>" class="form-control" disabled>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">N.I.C No. :</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['nic']; ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Gender :</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['gender']; ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">School :</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['school']; ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Address :</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['address']; ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">E-mail Address :</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['email']; ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Telephone No. :</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['telephone']; ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group text-center">
                        <?php if(isset($_GET['index_no']) && $total==1) { ?>
                        <br/>
                        <?php if($row['checked']=='0') { ?>
                        <button type="button" name="check" onclick="location.href='student.details.check.php?index_no=<?=$index_no?>'" class="btn btn-danger btn-pill">Check</button>
                        <?php } ?>    
                        <button type="button" name="edit" onclick="location.href='student.edit.php?index_no=<?=$index_no?>'" class="btn btn-primary btn-pill">Edit</button>
                        <?php } ?>
                        <button type="button" name="reset" onclick="location.href='student.details.php'" class="btn btn-purple btn-pill">Reset</button>
                        <button type="button" name="cancel" onclick="location.href='students.php'" class="btn btn-secondary btn-pill">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php
include_once("footer.php");
?>