<?php 
include("db_config.php");
include("features.php");
?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style_custom.css">

<style>
body {
    background-color: #FFF;
}
</style>

<div class="site-section" style="padding-bottom:3rem;">
    <div class="container">
        <div class="justify-content-center align-items-center">
            <div class="col-lg-7 mx-auto">
                <form action="" method="post" class="form-box" style="padding-bottom: 0; padding-top: 0;">
                    <label class="col-sm-12" style="text-align:center; padding: 20px 0; font-size: 1.1rem; font-weight: 350;">G.C.E. (A/L) PILOT EXAMINATION <?=$year?></label>
                    <div class="form-group row">
                        <div class="col-md-8">
                            <input type="text" name="index_no" <?php if(isset($_POST['index_no'])){?> value="<?php echo $_POST['index_no'];?>" <?php } else { ?>  autofocus="" <?php } ?> maxlength="6" minlength="6" class="form-control" placeholder="Index No." required>
                        </div>
                        <div class="col-md-4">
                            <input style="width:100%" type="submit" name="view" class="btn btn-primary" value="Show Results">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php

$index_no = '';

if(isset($_POST["index_no"])){
    $index_no = $_POST["index_no"];

    $query1 = "SELECT A.*, B.subject1_name, B.subject2_name, B.subject3_name FROM tbl_marks_final_draft A, tbl_subjects B WHERE A.index_no = '$index_no' AND A.subject_group_id = B.subject_group_id";
    $result1 = mysqli_query($db, $query1);
    $total1 = mysqli_num_rows($result1);

    $query2 = "SELECT * FROM tbl_students WHERE index_no = '$index_no'";
    $result2 = mysqli_query($db, $query2);
    $total2 = mysqli_num_rows($result2);

    if(($total1 == 1) && ($total2 == 1)) {
        
        $row1 = mysqli_fetch_assoc($result1);
        $stream_id = $row1['stream_id'];

        if($stream_id == '1') {
            $stream = 'BIOLOGICAL SCIENCE';
        } 
        else if($stream_id == '2') {
            $stream = 'PHYSICAL SCIENCE';
        }

        $subject1_name = $row1['subject1_name'];
        $subject2_name = $row1['subject2_name'];
        $subject3_name = $row1['subject3_name'];
        
        $subject1_result = $row1['subject1_result'];
        $subject2_result = $row1['subject2_result'];
        $subject3_result = $row1['subject3_result'];

        $subject1_absence = $row1['subject1_absence'];
        $subject2_absence = $row1['subject2_absence'];
        $subject3_absence = $row1['subject3_absence'];

        $query3 = "SELECT * FROM tbl_final_marks WHERE index_no = '$index_no'";
        $result3 = mysqli_query($db, $query3);
        $total3 = mysqli_num_rows($result3);

        if($total3==1) {
            $row3=mysqli_fetch_assoc($result3);
            
            $zscore = $row3['z_score'];
            $d_rank = $row3['district_rank'];
            $is_rank = $row3['island_rank'];
        }
        else {
            $zscore = "NZ";
            $d_rank = "NR";
            $is_rank = "NR";
        }

        if(($subject1_result == "F") || ($subject2_result == "F") || ($subject3_result == "F")) {
            $zscore = "NZ";
            $d_rank = "NR";
            $is_rank = "NR";
        }
?>

<center>
<div style="font-size:11px; margin:5px; border: 1px solid #a8a8a8; border-radius:10px; background:white; max-width: 750px; padding:20px;">
    <div style="width: 100%; margin-left: auto; margin-right: auto;">
        <div style="width:100%">
            <table>
                <tbody>
                    <tr>
                        <td style="text-align:right;">
                            Examination :
                        </td>
                        <td style="text-align:left;border-left:none;padding-left: 0.75rem;">								
                            G.C.E. (A/L) PILOT EXAMINATION
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:right;">
                            Year :
                        </td>
                        <td style="text-align:left;border-left:none;padding-left: 0.75rem;">								
                            <?=$year?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:right;">
                            Name :
                        </td>
                        <td style="text-align:left;border-left:none;padding-left: 0.75rem;">								
                            <?php echo strtoupper($row1['name']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:right;">
                            Index Number :
                        </td>
                        <td style="text-align:left;border-left:none;padding-left: 0.75rem;">								
                            <?php echo strtoupper($index_no); ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:right;">
                            District Rank :
                        </td>
                        <td style="text-align:left;border-left:none;padding-left: 0.75rem;">								
                            <?php if($d_rank!="NR") { ?>
                                <font color = "blue"> <?php echo $d_rank; ?> </font>
                            <?php } else { ?>
                                <font color="red"> NR </font>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:right;">
                            Island Rank :
                        </td>
                        <td style="text-align:left;border-left:none;padding-left: 0.75rem;">								
                            <?php if($d_rank!="NR") { ?>
                                <font color = "blue"> <?php echo $is_rank; ?> </font>
                            <?php } else { ?>
                                <font color="red"> NR </font>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr role="row">
                        <td style="text-align:right;">
                            Z-Score :
                        </td>
                        <td style="text-align:left;border-left:none;padding-left: 0.75rem;">								
                            <?php if($d_rank!="NR") { ?>
                                <font color = "blue"> <?php echo number_format((float)$zscore, 4, '.', ''); ?> </font>
                            <?php } else { ?>
                                <font color="red"> NZ </font>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:right;">
                            Subject Stream :
                        </td>
                        <td style="text-align:left;border-left:none;padding-left: 0.75rem;">								
                            <?php echo $stream; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:right;">
                            Syllabus :
                        </td>
                        <td style="text-align:left;border-left:none;padding-left: 0.75rem;">								
                            <?php echo strtoupper($row1['syllabus']); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br/>
    <br/>

    <div class="col result_table">
        <table class="table table-sm table-striped table-bordered">
            <thead class="thead-light text-center">
                <tr role="row">
                    <th style="width:70%">
                        <span>Subject</span>
                    </th>
                    <th style="width:15%">
                        <span>Result</span>
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td style="padding-left: 0.75rem;"> <?php echo $subject1_name; ?> </td>
                    <td style="text-align:center;">
                        <?php if($subject1_absence=='0'){ ?>
                            <font color="blue"> <?php  echo ($subject1_result); ?> </font>
                        <?php } else { ?>
                            <font color="red"> AB </font>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 0.75rem;"> <?php echo $subject2_name; ?> </td>
                    <td style="text-align:center;">
                        <?php if($subject2_absence=='0'){ ?>
                            <font color="blue"> <?php  echo ($subject2_result); ?> </font>
                        <?php } else { ?>
                            <font color="red"> AB </font>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 0.75rem;"> <?php echo $subject3_name; ?> </td>
                    <td style="text-align:center;">
                        <?php if($subject3_absence=='0'){ ?>
                            <font color="blue"> <?php echo ($subject3_result); ?> </font>
                        <?php } else { ?>
                            <font color="red"> AB </font>
                        <?php } ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div align="center">
        <span style="margin-top:15px;display:block;">Copyright © <?=$year?> - Mora E-Tamils <?=$committeeYear?> | Examination Committee</span>
    </div>
</div>
</center>

<?php } else { ?>

<center>
<div style="font-size:11px; margin:5px; border: 1px solid #a8a8a8; border-radius:10px; background:white; max-width: 750px; padding:20px;">
    <div style="width: 100%; margin-left: auto; margin-right: auto;">
        <div style="width:100%">

            <div style="margin: 10px auto; font-size: 24px; text-align: center; color: red;">
                <?php
                if(($total2 == 1) && ($total1 == 0)) { ?>
                    <p style="font-size: 16px; padding: 10px 0;">
                        You were absent for all examinations. <br/>
                        நீங்கள் எந்தவொரு பரீட்சைக்கும் சமூகமளித்திருக்கவில்லை.
                    </p>
                <?php 
                }else if($total2 == 0){ ?>
                    <b>NOT FOUND</b> <br/>
                    <p style="font-size: 16px; padding: 10px 0;">
                        System could not show your results. Please check your index number. <br/>
                        உங்களது பெறுபேற்றினை பெற முடியவில்லை. தயவு செய்து உங்களது சுட்டெண்ணை சரிபார்க்கவும்.
                    </p>
                <?php 
                } else { ?>
                    <p style="font-size: 16px; padding: 10px 0;">
                        Your Results has not updated yet,due to unavoidable circumstances please wait for your results. <br/>
                        தவிர்க்க முடியாத காரணத்தால் உமது பெறுபேற்றை வெளியிட முடியவில்லை. தயவு செய்து காத்திருக்கவும்.
                    </p>
                <?php } ?>
            </div>
            
            <div align="center">
                <span style="margin-top:15px;display:block;">Copyright © <?=$year?> - Mora E-Tamils <?=$committeeYear?> | Examination Committee</span>
            </div>
        </div>
    </div>
</div>
</center>
   
<?php } }?>


<!-- oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" -->