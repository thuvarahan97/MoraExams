<?php
include_once("header.php");
include("assets/marks.details.inc.php");
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

include_once("marks.banner.php");
?>

<div class="site-section">
    <div class="container">

        <div class="justify-content-center align-items-center">
            <div class="col-lg-7 mx-auto" data-aos="fade-up" data-aos-delay="500">
                <form action="" method="post" class="form-box" style="padding-bottom: 0">
                    <h3 class="h4 text-black mb-4 text-center">Check <?php echo $subject_name.' - '.'Part '.$part_num; ?> Marks</h3>
                    <br/>

                    <input type="text" name="subject" style="display:none;" value="<?php if($subject_num!=''){echo $subject_num;} ?>" class="form-control" >
                    <input type="text" name="part" style="display:none;" value="<?php if($part!=''){echo $part;} ?>" class="form-control">

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
                        else if($error_msg==md5("not_entered_error"))
                        { ?>
                            <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Marks Not Entered!</label>
                        <?php
                        }
                        else if($error_msg==md5("stream_error"))
                        { ?>
                            <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Incorrect Subject Stream!</label>
                        <?php
                        }
                        else if($error_msg==md5("already_checked_error"))
                        { ?>
                            <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Already Checked!</label>
                        <?php
                        }
                        else if($error_msg==md5("check_failed"))
                        { ?>
                            <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Failed to Check!</label>
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
                        if($row[$sub_checked]=='1') { ?>
                            <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Already Checked!</label>
                        <?php 
                        } else if(empty($row[$sub_checked])) { ?>
                            <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Not Checked Yet!</label>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                
                <br/>
                
                <?php } ?>

                <div class="form-box" style="padding-top: 0;">
                    <?php if(isset($_GET['index_no']) && $total==1) { ?>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Marks :</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row[$subject_index]; ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group text-center">
                        <?php if(isset($_GET['index_no']) && $total==1) { ?>
                        <br/>
                        <?php if(($row[$sub_checked_by]=='0') || ($row[$sub_checked_by]=='')) { ?>
                        <button type="button" name="check" onclick="location.href='marks.details.check.php?subject=<?=$subject_num?>&part=<?=$part?>&index_no=<?=$index_no?>&subject_index=<?=$subject_index?>&sub_checked=<?=$sub_checked?>&sub_checked_by=<?=$sub_checked_by?>'" class="btn btn-danger btn-pill">Check</button>
                        <?php } ?>
                        <button type="button" name="edit" onclick="location.href='marks.details.edit.php?subject=<?=$subject_num?>&part=<?=$part?>&index_no=<?=$index_no?>&subject_index=<?=$subject_index?>'" class="btn btn-primary btn-pill">Edit</button>
                        <?php } ?>
                        <button type="button" name="reset" onclick="location.href='marks.details.php?subject=<?=$subject_num?>&part=<?=$part?>'" class="btn btn-purple btn-pill">Reset</button>
                        <button type="button" name="cancel" onclick="location.href='marks.php?subject=<?=$subject_num?>&part=<?=$part?>'" class="btn btn-secondary btn-pill">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php
include_once("footer.php");
?>