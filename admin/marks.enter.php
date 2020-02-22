<?php
include_once("header.php");
include("assets/marks.enter.inc.php");
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

<style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none;
  margin: 0; 
}
</style>

<div class="site-section">
    <div class="container">

        <div class="justify-content-center align-items-center">
            <div class="col-lg-8 mx-auto" data-aos="fade-up" data-aos-delay="500">
                <form action="" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4 text-center">Enter <?php echo $subject_name." - ".$part_num?> Marks</h3>

                    <?php if($error_msg!="") { ?>
                        <div class="form-group">
                            <?php
                            if($error_msg==md5("already_exists_error"))
                            { ?>
                                <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Marks have been already entered!</label>
                            <?php
                            }
                            else if($error_msg==md5("failed"))
                            { ?>
                                <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Failed to Enter Marks!</label>
                            <?php
                            }
                            else if($error_msg==md5("not_checked_error"))
                            { ?>
                                <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Not Checked Yet!</label>
                            <?php
                            }
                            else if($error_msg==md5("stream_error"))
                            { ?>
                                <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Incorrect Subject Stream!</label>
                            <?php
                            }
                            else if($error_msg==md5("not_found_error"))
                            { ?>
                                <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Index No. is Not Found!</label>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    } 
                    
                    else if($success_msg!="") { ?>
                        <div class="form-group">
                            <?php
                            if($success_msg=="entered")
                            { ?>
                                <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Entered!</label>
                            <?php
                            } ?>
                        </div>
                    <?php 
                    }
                    
                    else { ?>
                        <br/>
                    <?php } ?>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Index No. :</label>
                        <div class="col-sm-8">
                            <input type="text" name="index_no" maxlength="6" minlength="6" class="form-control" placeholder="Index No." autofocus="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Marks :</label>
                        <div class="col-sm-8">
                            <input type="number" name="marks" min="0" max="100" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" class="form-control" placeholder="Marks" required>
                        </div>
                    </div>
                    <input type="text" name="subject_num" class="form-control" value="<?=$subject_num;?>" style="display:none">
                    <input type="text" name="part" class="form-control" value="<?=$part;?>" style="display:none">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="enter" class="btn btn-primary btn-pill" value="Enter">
                        <button type="button" name="reset" onclick="location.href='marks.enter.php?subject=<?=$subject_num;?>&part=<?=$part;?>'" class="btn btn-purple btn-pill">Reset</button>
                        <button type="button" name="cancel" onclick="location.href='marks.php?subject=<?=$subject_num;?>&part=<?=$part;?>'" class="btn btn-secondary btn-pill">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>

<?php
include_once("footer.php");
?>